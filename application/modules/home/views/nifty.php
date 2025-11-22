<style>
    .mil-banner{
        padding-top: 40px!important;
    }
    @media (max-width:900px){
        .mil-banner{
            padding-top: 30px!important;
        }
    }
</style>
<div class="mil-banner" id="stock-container" style="display: flex; flex-direction: column;height:auto;padding-bottom:20px;margin-top:0px"></div>

<style>
/* Your existing CSS */
.stock-marquee-wrapper { width:100%; overflow:hidden; padding:20px 10px; background:#f6f9fc; border-radius:20px; }
.stock-marquee { display:flex; gap:20px; animation:scroll-left 25s linear infinite; }
.stock-card { min-width:220px; background:#fff; padding:16px; border-radius:15px; display:flex; flex-direction:row; align-items:center; gap:12px; box-shadow:0 4px 18px rgba(0,0,0,0.06); border:1px solid #e8eef1; transition:0.2s; }
.stock-card:hover { transform:translateY(-3px); }
.stock-logo { width:40px; height:40px; border-radius:8px; object-fit:contain; background:#fff; padding:5px; border:1px solid #eee; }
.info { flex:1; }
.stock-name { font-size:14px; font-weight:600; color:#004d4d; margin:0; }
.stock-price { font-size:15px; font-weight:700; margin-top:4px; color:#333; }
.change-box { margin-top:6px; display:inline-block; font-size:13px; font-weight:600; padding:3px 8px; border-radius:6px; color:#fff; }

@keyframes scroll-left { 0% { transform:translateX(0); } 100% { transform:translateX(-100%); } }

.stock-card-grid { background:#fff; border-radius:15px; padding:18px; box-shadow:0 4px 15px rgba(0,0,0,0.05); border:1px solid #e8eef1; transition:0.25s; }
.stock-card-grid:hover { transform:translateY(-4px); box-shadow:0 6px 20px rgba(0,0,0,0.1); }
.stock-logo-grid { width:46px; height:46px; border-radius:10px; padding:5px; background:#fff; border:1px solid #eee; object-fit:contain; }
.stock-name-grid { font-size:16px; font-weight:600; color:#003939; }
.stock-price-grid { font-size:18px; font-weight:700; margin-top:4px; }
.stock-change-grid { font-size:14px; font-weight:600; padding:5px 10px; color:#fff; border-radius:8px; display:inline-block; margin-top:8px; }
.mil-banner { margin-top:50px; }
@media (max-width:992px) { .stock-card { min-width:180px; } }
@media (max-width:576px) { .stock-card { min-width:150px; padding:12px; } .stock-logo { width:35px; height:35px; } .stock-logo-grid { width:38px; height:38px; } }

/* Skeleton Loading */
.skeleton { background: #e2e2e2; border-radius: 6px; display: inline-block; }
.skeleton-logo { width:40px; height:40px; border-radius:8px; }
.skeleton-name { width:80px; height:14px; margin:2px 0; }
.skeleton-price { width:60px; height:18px; margin:2px 0; }
.skeleton-change { width:60px; height:16px; border-radius:6px; margin-top:4px; }
.skeleton-grid-logo { width:46px; height:46px; border-radius:10px; }
.skeleton-grid-name { width:100px; height:16px; margin:4px 0; }
.skeleton-grid-price { width:70px; height:18px; margin:2px 0; }
.skeleton-grid-change { width:70px; height:16px; border-radius:8px; margin-top:6px; }

/* Animation */
@keyframes shimmer {
  0% { background-position: -200px 0; }
  100% { background-position: 200px 0; }
}
.skeleton { background: linear-gradient(90deg, #e2e2e2 25%, #f0f0f0 50%, #e2e2e2 75%); background-size: 400px 100%; animation: shimmer 1.2s infinite; }
</style>

<script>
let oldData = [];

function buildSkeleton() {
    let marqueeSkeleton = `<div class="stock-marquee-wrapper"><div class="stock-marquee">`;
    for(let i=0;i<10;i++){
        marqueeSkeleton += `
        <div class="stock-card">
            <div class="skeleton skeleton-logo"></div>
            <div class="info" style="display:flex;flex-direction:column;">
                <div class="skeleton skeleton-name"></div>
                <div class="skeleton skeleton-price"></div>
                <div class="skeleton skeleton-change"></div>
            </div>
        </div>`;
    }
    marqueeSkeleton += `</div></div>`;

    let gridSkeleton = `<div class="container mt-4"><h3 class="mb-3" style="font-weight:700;color:#003939;">Top Nifty 50 Stocks</h3><div class="row g-4">`;
    for(let i=0;i<12;i++){
        gridSkeleton += `
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="stock-card-grid">
                <div class="d-flex align-items-center" style="gap:10px"s>
                    <div class="skeleton skeleton-grid-logo"></div>
                    <div  style="display:flex;flex-direction:column;">
                        <div class="skeleton skeleton-grid-name"></div>
                        <div class="skeleton skeleton-grid-price"></div>
                    </div>
                </div>
                <div class="skeleton skeleton-grid-change"></div>
            </div>
        </div>`;
    }
    gridSkeleton += `</div></div>`;

    document.getElementById('stock-container').innerHTML = marqueeSkeleton + gridSkeleton;
}

// Call skeleton initially
buildSkeleton();

function buildStocksHTML(data) {
    // Build actual HTML after data arrives
    let marqueeHTML = `<div class="stock-marquee-wrapper"><div class="stock-marquee" id="stock-marquee">`;
    data.concat(data).forEach((s,i)=>{
        let d = s.data || {};
        let price = d.last_price?.value || 0;
        let change = d.change?.value || 0;
        let percent = d.percent_change?.value || 0;
        let up = change >= 0;
        let bg = up ? "#16c784" : "#ef5350";
        let sign = up ? "+" : "-";
        let logo = s.logo || 'https://via.placeholder.com/42?text=NA';

        marqueeHTML += `
        <div class="stock-card" id="marquee-${i}">
            <img src="${logo}" class="stock-logo">
            <div class="info">
                <p class="stock-name">${s.ticker}</p>
                <p class="stock-price" id="marquee-price-${i}">₹${price.toFixed(2)}</p>
                <span class="change-box" id="marquee-change-${i}" style="background:${bg}">
                    ${sign}${Math.abs(change)} | ${sign}${Math.abs(percent)}%
                </span>
            </div>
        </div>`;
    });
    marqueeHTML += `</div></div>`;

    let gridHTML = `<div class="container mt-4"><h3 class="mb-3" style="font-weight:700;color:#003939;">Top Nifty 50 Stocks</h3><div class="row g-4">`;
    data.forEach((s,i)=>{
        let d = s.data || {};
        let price = d.last_price?.value || 0;
        let change = d.change?.value || 0;
        let percent = d.percent_change?.value || 0;
        let up = change >= 0;
        let bg = up ? "#16c784" : "#ef5350";
        let sign = up ? "+" : "-";
        let logo = s.logo || 'https://via.placeholder.com/42?text=NA';

        gridHTML += `
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6">
            <div class="stock-card-grid" id="grid-${i}">
                <div class="d-flex align-items-center" style="gap:10px">
                    <img src="${logo}" class="stock-logo-grid">
                    <div>
                        <div class="stock-name-grid">${s.ticker}</div>
                        <div class="stock-price-grid" id="grid-price-${i}">₹${price.toFixed(2)}</div>
                    </div>
                </div>
                <div class="stock-change-grid" id="grid-change-${i}" style="background:${bg}">
                    ${sign}${Math.abs(change)} | ${sign}${Math.abs(percent)}%
                </div>
            </div>
        </div>`;
    });
    gridHTML += `</div></div>`;

    document.getElementById('stock-container').innerHTML = marqueeHTML + gridHTML;
    oldData = data;
}

function updateStocks() {
    fetch('<?= site_url("nifty-json") ?>')
    .then(res => res.json())
    .then(data => {
        if(!data || data.length===0) return;

        if(!oldData.length){
            buildStocksHTML(data);
            return;
        }

        data.forEach((s,i)=>{
            let old = oldData[i] || {};
            let oldD = old.data || {};
            let d = s.data || {};

            let price = d.last_price?.value || 0;
            let change = d.change?.value || 0;
            let percent = d.percent_change?.value || 0;
            let up = change >= 0;
            let bg = up ? "#16c784" : "#ef5350";
            let sign = up ? "+" : "-";

            if(oldD.last_price?.value !== price || oldD.change?.value !== change){
                document.getElementById(`marquee-price-${i}`).innerText = `₹${price.toFixed(2)}`;
                let mc = document.getElementById(`marquee-change-${i}`);
                mc.innerText = `${sign}${Math.abs(change)} | ${sign}${Math.abs(percent)}%`;
                mc.style.background = bg;

                document.getElementById(`grid-price-${i}`).innerText = `₹${price.toFixed(2)}`;
                let gc = document.getElementById(`grid-change-${i}`);
                gc.innerText = `${sign}${Math.abs(change)} | ${sign}${Math.abs(percent)}%`;
                gc.style.background = bg;

                oldData[i] = s;
            }
        });
    })
    .catch(err => console.error(err));
}

updateStocks();
setInterval(updateStocks, 2000);
</script>

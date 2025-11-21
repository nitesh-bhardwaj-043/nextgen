<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content">
        <div class="mil-banner mil-dissolve" >
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-xl-6">
                        <div class="mil-card mil-up" style="padding: 40px; border-radius: 30px; box-shadow: 0 0 40px #fff;">

                            <!-- Step 1 -->
                            <div id="step1">
                                <h2 class="mil-text-gradient-3 mil-mb-30">Deposit Money</h2>
                                <p class="mil-soft mil-mb-30">Scan the QR code or use the UPI ID to make payment.</p>

                                <div class="mil-text-center mil-mb-40">
                                    <img src="https://imgs.search.brave.com/vAFXUpjxSkU9Ibl99G8AwWw5bfEhmacxyBovgZfMddc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS5pc3RvY2twaG90/by5jb20vaWQvMTQ0/NTM4NzgxNS92ZWN0/b3Ivc2Nhbi1tZS1x/ci1jb2RlLXNjYW5u/aW5nLXZlY3Rvci1p/bGx1c3RyYXRpb24u/anBnP3M9NjEyeDYx/MiZ3PTAmaz0yMCZj/PXp0TWtFWmVFTHZu/LXZNVndOYmJKdnNa/dmM3dVAzUU5VWlFm/TWw4MTl0a0E9" alt="QR"
                                        style="width: 220px; border-radius: 20px; border: 3px solid #222;">
                                </div>

                                <div class="mil-mb-40">
                                    <h5 class="mil-text-gradient-2 mil-mb-10">UPI ID:</h5>
                                    <div class="mil-btn mil-light" style="padding: 12px 20px;">
                                        plaxfinance@upi
                                    </div>
                                </div>

                                <button class="mil-btn mil-sm" onclick="nextStep()">
                                    Next
                                </button>
                            </div>

                            <!-- Step 2 -->
                            <div id="step2" style="display:none;">
                                <h2 class="mil-text-gradient-3 mil-mb-30">Submit Payment Details</h2>

                                <p class="mil-soft mil-mb-20">Enter UTR number received after successful payment.</p>
                                <input class="mil-input mil-mb-30" type="text" placeholder="Enter UTR / Transaction ID">

                                <p class="mil-soft mil-mb-10">Upload Screenshot:</p>
                                <input class="mil-input mil-mb-30" type="file" accept="image/*">

                                <button class="mil-btn mil-md mil-add-arrow">
                                    Submit Deposit Request
                                </button>

                                <button class="mil-btn mil-light mil-md mil-mt-20" onclick="backStep()">
                                    ← Back
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</div>
</div>
<script>
    function nextStep() {
        document.getElementById("step1").style.display = "none";
        document.getElementById("step2").style.display = "block";
    }

    function backStep() {
        document.getElementById("step2").style.display = "none";
        document.getElementById("step1").style.display = "block";
    }
</script>
<style>
    .mil-banner {
        padding-top: 120px;
        height: 100% !important;
    }

    .mil-card {
        padding: 40px;
        border-radius: 30px;
        box-shadow: 0 0 45px rgba(220, 220, 220, 0.9);
        background: #fff;
    }

    .mil-label {
        font-weight: 600;
        color: #0f3f44;
        font-size: 15px;
        margin-bottom: 10px;
        display: block;
    }

    .mil-input-box {
        height: 55px;
        border-radius: 14px;
        border: 1px solid #dfe8ea;
        padding: 0 20px;
        width: 100%;
        background: #fdfefe;
        font-size: 15px;
        color: #123b40;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .mil-copy-btn {
        cursor: pointer;
        color: #0c7c84;
        font-weight: bold;
        font-size: 14px;
    }

    .refer-card {
        margin-top: 28px;
        border-radius: 12px;
    }

    /* ------------------------ TABLE IMPROVED CSS ------------------------ */

    .refer-table {
        border-collapse: separate !important;
        border-spacing: 0 10px !important; /* spacing between rows */
    }

    .refer-table thead th {
        background: #f2f7f8;
        border: none;
        padding: 14px;
        color: #0f3f44;
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .refer-table tbody tr {
        background: #ffffff;
        box-shadow: 0 3px 12px rgba(0, 0, 0, 0.05);
        border-radius: 10px;
        overflow: hidden;
    }

    .refer-table tbody td {
        padding: 18px 20px !important;
        font-size: 15px;
        vertical-align: middle;
        color: #264043;
    }

    .refer-table tbody tr:hover {
        background: #f5fdfd !important;
        box-shadow: 0 5px 16px rgba(0, 0, 0, 0.08);
        transform: translateY(-2px);
        transition: 0.2s ease-in-out;
    }

    .referred-badge {
        font-size: 12px;
        padding: 6px 8px;
        border-radius: 999px;
    }

    .avatar-sm {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: inline-block;
        background: #e9f6f5;
        color: #0f3f44;
        text-align: center;
        line-height: 40px;
        font-weight: 700;
        margin-right: 10px;
        font-size: 16px;
    }

    @media (max-width: 1200px) {
        .mil-banner {
            padding-top: 40px;
        }
    }
</style>


<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>

    <div id="smooth-content">
        <div class="mil-banner mil-dissolve">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9 col-md-10">
                        <div class="mil-card">
                            <h2 class="mil-title">Refer & Earn</h2>
                            <p class="mil-subtitle">Invite friends. Earn 5% of their first deposit when approved.</p>

                            <!-- Referral Code Row -->
                            <div class="row g-3 align-items-center">
                                <div class="col-md-8 col-12">
                                    <label class="form-label mb-2" style="font-weight:600; color:#0f3f44;">Your Referral Code</label>
                                    <div class="mil-input-box" id="refCodeBox" role="textbox" aria-readonly="true">
                                        <span id="refCode" style="font-weight:700; letter-spacing:1px;"><?= htmlspecialchars($referral_code) ?></span>
                                        <span class="mil-copy-btn" onclick="copyText('refCode')" title="Copy referral code">Copy</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Referral Stats Table -->
                            <div class="refer-card card mt-4 shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h5 class="mb-0" style="font-weight:700;">People you referred</h5>
                                        <small class="text-muted"><?= count($referrals) ?> total</small>
                                    </div>

                                    <?php if (!empty($referrals)): ?>
                                        <div class="table-responsive">
                                            <table class="table refer-table align-middle">
                                                <thead>
                                                    <tr>
                                                        <th style="width:60px">#</th>
                                                        <th>Name</th>
                                                        <th>Phone</th>
                                                        <th>Referred On</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php $i = 1;
                                                    foreach ($referrals as $r):
                                                        $name = htmlspecialchars($r['name'] ?? $r['referred_name'] ?? '-');
                                                        $phone = htmlspecialchars($r['phone'] ?? $r['referred_phone'] ?? '-');
                                                        $created = !empty($r['created_at']) ? date('d M Y, H:i', strtotime($r['created_at'])) : '-';

                                                        $status = isset($r['first_deposit_done'])
                                                            ? ($r['first_deposit_done'] ? 'Bonus paid' : 'Pending')
                                                            : '';
                                                    ?>
                                                        <tr>
                                                            <td><?= $i++ ?></td>

                                                            <td>
                                                                <span class="avatar-sm"><?= strtoupper(substr($name, 0, 1)) ?></span>
                                                                <strong><?= $name ?></strong>
                                                            </td>

                                                            <td><?= $phone ?></td>
                                                            <td><?= $created ?></td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    <?php else: ?>
                                        <div class="alert alert-info mb-0">
                                            You haven't referred anyone yet. Share your code to start earning.
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div> <!-- card end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function copyText(elementId) {
        var text = document.getElementById(elementId).innerText;
        navigator.clipboard.writeText(text);
        alert("Copied Successfully!");
    }
</script>

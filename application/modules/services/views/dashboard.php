<div id="smooth-wrapper" class="mil-wrapper">
    <div class="mil-progress-track">
        <div class="mil-progress"></div>
    </div>
    <div class="progress-wrap active-progress"></div>
    <div id="smooth-content">
        <div class="container" style="margin-top: 100px;">
            <div class="top-bar">
                <div>
                    <h2 style="margin:0">Welcome, <span class="username"><?= htmlspecialchars($user['name']) ?></span></h2>
                    <div class="muted">Here's your account summary</div>
                </div>
            </div>
            <div class="grid">
                <div>
                    <div class="card profile">
                        <div class="avatar"><?= htmlspecialchars(substr($user['name'], 0, 1)) ?></div>
                        <div style="margin-top:10px; font-weight:700;"><?= htmlspecialchars($user['name']) ?></div>
                        <div class="muted"><?= htmlspecialchars($user['email']) ?></div>
                        <div class="muted" style="margin-top:6px;">+<?= $user['phone'] ?></div>

                        <div style="margin-top:14px; width:100%;">
                            <div class="metric">
                                <div>
                                    <div class="label">Total Invested</div>
                                    <div class="val">₹ <?= $dashboard['amount'] ?></div>
                                </div>
                                <div style="text-align:right;">
                                    <div class="label">Interest Credited</div>
                                    <div class="val">₹ <?= $dashboard['amount'] - $dashboard['t_amount'] ?></div>
                                </div>
                            </div>

                            <div class="actions">
                                <button class="btn-primary" onclick="location.href='<?= site_url() ?>/withdraw'">
                                    <i class="fa-solid fa-arrow-up-from-bracket"></i>&nbsp; Withdraw
                                </button>
                                <button class="btn-outline" onclick="location.href='<?= site_url() ?>/deposit'">
                                    <i class="fa-solid fa-plus"></i>&nbsp; Deposit
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card" style="margin-top:16px;">
                        <h4>Account Overview</h4>
                        <div class="muted">Quick stats</div>

                        <div style="display:flex; gap:8px; flex-wrap:wrap;">
                            <div style="flex:1; min-width:140px;">
                                <div class="balance-card">
                                    <div class="muted">Available Balance</div>
                                    <div class="big">₹ <?= $dashboard['t_amount'] ?></div>
                                    <div class="muted">(after reserve)</div>
                                </div>
                            </div>

                            <div style="flex:1; min-width:140px;">
                                <div class="balance-card">
                                    <div class="muted">Pending Deposits</div>
                                    <div class="big">₹ <?= $dashboard['d_amount'] ?></div>
                                </div>
                            </div>

                            <div style="flex:1; min-width:140px;">
                                <div class="balance-card">
                                    <div class="muted">Pending Withdrawals</div>
                                    <div class="big">₹ <?= $dashboard['w_amount'] ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT SECTION -->
                <div>
                    <div class="card">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div>
                                <h3>Recent Transactions</h3>
                                <div class="muted">Latest activity on your account</div>
                            </div>
                            <div style="text-align:right;">
                                <a href="<?= site_url() ?>/transactions" class="btn-primary text-white">View all</a>
                            </div>
                        </div>

                        <div style="margin-top:12px;">
                            <?php $recent = array_slice($transactions ?? [], 0, 5); ?>
                            <?php if (!empty($recent)) : ?>
                                <table class="ticker-table" id="recent-trans">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Amount</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($recent as $t) : ?>
                                            <tr class="ticker-row">
                                                <td><?= htmlspecialchars($t['type']) ?></td>
                                                <td>₹ <?= htmlspecialchars($t['amount']) ?></td>
                                                <td><?= htmlspecialchars($t['created_at'] ?? '') ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <div class="muted">No recent transactions</div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card" style="margin-top:16px;">
                        <div style="margin-top:16px;">
                            <h4>Bank Details</h4>
                            <?php if (!empty($bank)) : ?>
                                <div class="muted">Account holder: <?= htmlspecialchars($bank['holder_name'] ?? ' -') ?></div>
                                <div class="muted">Bank Name: <?= htmlspecialchars($bank['bank_name'] ?? ' -') ?></div>
                                <div class="muted">Account no: <?= htmlspecialchars($bank['acc_no'] ?? ' -') ?></div>
                                <div class="muted">IFSC: <?= htmlspecialchars($bank['ifsc_code'] ?? ' -') ?></div>
                                <div class="muted">UPI: <?= htmlspecialchars($bank['upi_id'] ?? ' -') ?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<!-- ======================= -->
<!--  ALL STYLES MOVED HERE -->
<!-- ======================= -->

<style>
    :root {
        --bg: #f6f8fb;
        --card: #ffffff;
        --muted: #6b7280;
        --primary: #0f172a;
        --success: #10b981;
        --danger: #ef4444;
        --shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
        font-family: Inter, system-ui, sans-serif;
    }

    body {
        background: var(--bg);
        margin: 0;
        color: var(--primary);
    }

    .container {
        max-width: 1120px;
        margin: 28px auto;
        padding: 0 20px;
    }

    .grid {
        display: grid;
        grid-template-columns: 320px 1fr;
        gap: 20px;
    }

    .card {
        background: var(--card);
        padding: 18px;
        border-radius: 12px;
        box-shadow: var(--shadow);
    }

    .profile {
        text-align: center;
    }

    .avatar {
        width: 78px;
        height: 78px;
        border-radius: 50%;
        font-weight: 700;
        font-size: 28px;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #06b6d4, #3b82f6);
    }

    .muted {
        color: var(--muted);
        font-size: 13px;
    }

    .big {
        font-size: 28px;
        font-weight: 700;
    }

    .metric {
        padding: 12px;
        background: #f8faff;
        border-radius: 10px;
        margin-bottom: 12px;
        display: flex;
        justify-content: space-between;
    }

    .label {
        color: var(--muted);
        font-size: 13px;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .btn-primary {
        background: linear-gradient(90deg, #3b82f6, #06b6d4);
        color: white;
        padding: 10px 14px;
        border: none;
        border-radius: 10px;
        cursor: pointer;
    }

    .btn-outline {
        background: white;
        border: 1px solid #e6eefb;
        padding: 10px 14px;
        border-radius: 10px;
        cursor: pointer;
    }

    .balance-card {
        background: linear-gradient(#fff, #f8fbff);
        padding: 18px;
        border-radius: 12px;
        text-align: center;
    }

    .ticker-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .ticker-table th,
    .ticker-table td {
        padding: 10px 8px;
        font-size: 14px;
    }

    .ticker-row {
        border-bottom: 1px solid #f0f4f8;
    }

    .green {
        color: var(--success);
        font-weight: 700;
    }

    .red {
        color: var(--danger);
        font-weight: 700;
    }

    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .small-btn {
        padding: 8px 12px;
        border-radius: 8px;
        border: 1px solid #e6eefb;
        background: #ffffff;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    @media (max-width:900px) {
        .grid {
            grid-template-columns: 1fr;
        }

        .top-bar {
            display: flex;
            flex-direction: column;
        }
    }
</style>
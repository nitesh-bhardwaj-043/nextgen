<!-- Transactions Section -->
<div class="mil-transactions mil-p-80-80" style="margin-top: 120px;">
    <div class="container">

        <!-- Title -->
        <div class="row mb-4">
            <div class="col-12 text-center">
                <h2 class="mil-mb-20 mil-up">Recent Transactions</h2>
                <p class="mil-text-m mil-soft mil-up">Track all your deposits, withdrawals, and earnings in one place.</p>
            </div>
        </div>

        <!-- Table Wrapper -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-10 col-md-12">

                <div class="mil-trans-card mil-up">
                    <div class="table-responsive">
                        <table class="table mil-trans-table" id="recent-trans">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Amount</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($transactions)) : ?>
                                    <?php foreach ($transactions as $t) : ?>
                                        <tr>
                                            <td>
                                                <span class="type-badge 
                                                    <?= strtolower($t['type']) === 'credit' ? 'credit' : 'debit' ?>">
                                                    <?= htmlspecialchars($t['type']) ?>
                                                </span>
                                            </td>
                                            <td>₹ <?= htmlspecialchars($t['amount']) ?></td>
                                            <td><?= htmlspecialchars($t['created_at'] ?? '') ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="3" class="text-center mil-soft">
                                            No transactions found.
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

<style>
    /* Glass Card */
    .mil-trans-card {
        background: rgba(255, 255, 255, 0.06);
        backdrop-filter: blur(15px);
        border-radius: 16px;
        padding: 30px;
        border: 1px solid rgba(255, 255, 255, 0.1);
        box-shadow: 0px 8px 35px rgba(0, 0, 0, 0.15);
        transition: none !important;
        /* disabled hover transition */
    }

    /* Remove hover animation */
    .mil-trans-card:hover {
        transform: none !important;
        box-shadow: 0px 8px 35px rgba(0, 0, 0, 0.15) !important;
    }

    /* Table */
    .mil-trans-table {
        width: 100%;
        font-size: 16px;
        color: #fff;
    }

    .mil-trans-table thead tr {
        background: rgba(255, 255, 255, 0.08);
    }

    .mil-trans-table th {
        padding: 15px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }

    .mil-trans-table td {
        padding: 14px 15px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.08);
    }

    /* Hover Effect on ROWS only */
    .mil-trans-table tbody tr {
        transition: 0.25s;
    }

    .mil-trans-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.07);
        transform: scale(1.01);
    }

    /* Type Badges */
    .type-badge {
        padding: 5px 12px;
        border-radius: 25px;
        font-size: 14px;
        font-weight: 600;
        color: #fff;
    }

    .type-badge.credit {
        background: linear-gradient(45deg, #0fd976, #0fb86a);
    }

    .type-badge.debit {
        background: linear-gradient(45deg, #ff4d4d, #d93535);
    }

    /* Responsive */
    @media(max-width: 768px) {

        .mil-trans-table th,
        .mil-trans-table td {
            font-size: 14px;
            padding: 12px 10px;
        }

        .type-badge {
            font-size: 12px;
            padding: 4px 10px;
        }
    }
</style>
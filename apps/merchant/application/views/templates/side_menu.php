<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">
    <section class="sidebar">
        <div class="side-logo hidden-xs hidden-sm">
            <img src="<?= $this->config->item('shared_resources_source') ?>images/xannia_white_logo.png" />
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li>
                <a href="/dashboard">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="header">Advanced search</li>
            <li>
                <a href="/sales/search">
                    <span>Sales</span>
                </a>
            </li>
            <li>
                <a href="/payouts/search">
                    <span>Payouts</span>
                </a>
            </li>
            <li class="header">Account Balance</li>
            <li>
                <a href="/balance/summary">
                    <span>Summary</span>
                </a>
            </li>
            <li>
                <a href="/balance/statement">
                    <span>Statement</span>
                </a>
            </li>
            <li class="header">Payment Methods</li>
            <li>
                <a href="/method/summary">
                    <span>Summary</span>
                </a>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
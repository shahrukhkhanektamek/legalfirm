<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('vendor.dashboard'))?>">
        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboard">Dashboard</span>
    </a>
</li>


<li class="nav-item">
    <a class="nav-link menu-link" href="#leads" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="leads">
        <i class="ri-message-2-line"></i> <span data-key="t-dashboards">Manage Leads</span>
    </a>
    <div class="collapse menu-dropdown" id="leads">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('vendor.booking-enquiry.list'))?>" class="nav-link" data-key="t-analytics">Booking</a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('vendor.lead-enquiry.list'))?>" class="nav-link" data-key="t-analytics">Enquiry</a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#membership" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="membership">
        <i class="ri-inbox-line"></i> <span data-key="t-dashboards">Membership</span>
    </a>
    <div class="collapse menu-dropdown" id="membership">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('vendor.package.list'))?>" class="nav-link" data-key="t-analytics">Packages</a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('vendor.package-history.list'))?>" class="nav-link" data-key="t-analytics">History</a>
            </li>
        </ul>
    </div>
</li>


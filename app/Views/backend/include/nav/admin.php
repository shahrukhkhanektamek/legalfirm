<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('admin.dashboard'))?>">
        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboard">Dashboard</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#manageuser" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="manageuser">
        <i class="ri-contacts-line"></i> <span data-key="t-dashboards">Manage User</span>
    </a>
    <div class="collapse menu-dropdown" id="manageuser">
        <ul class="nav nav-sm flex-column">

            <li class="nav-item">
                <a href="<?=base_url(route_to('admin-user.list'))?>" class="nav-link" data-key="t-analytics"> Advocates </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('admin-user.list'))?>" class="nav-link" data-key="t-analytics"> CA </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('admin-user.list'))?>" class="nav-link" data-key="t-analytics"> Advisers </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('admin-user.list'))?>" class="nav-link" data-key="t-analytics"> Users </a>
            </li>

            <li class="nav-item">
                <a href="<?=base_url(route_to('admin-user.list'))?>" class="nav-link" data-key="t-analytics"> Kyc </a>
            </li>
        </ul>
    </div>
</li> <!-- end Dashboard Menu -->


<li class="nav-item">
    <a class="nav-link menu-link" href="#leads" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="leads">
        <i class="ri-message-2-line"></i> <span data-key="t-dashboards">User Leads</span>
    </a>
    <div class="collapse menu-dropdown" id="leads">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('booking-enquiry.list'))?>" class="nav-link" data-key="t-analytics"> Booking </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('lead-enquiry.list'))?>" class="nav-link" data-key="t-analytics"> Enquiry </a>
            </li>
        </ul>
    </div>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('transaction.list'))?>">
        <i class="ri-wallet-line"></i> <span data-key="t-transaction">Payment History</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('transaction.list'))?>">
        <i class="ri-wallet-line"></i> <span data-key="t-transaction">Cases</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link menu-link" href="#services" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="services">
        <i class="ri-message-2-line"></i> <span data-key="t-dashboards">Services</span>
    </a>
    <div class="collapse menu-dropdown" id="services">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('service-category.list'))?>" class="nav-link" data-key="t-analytics">Category </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('service.list'))?>" class="nav-link" data-key="t-analytics"> Service </a>
            </li>
        </ul>
    </div>
</li>



<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">AI Assistance</span></li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('transaction.list'))?>">
        <i class="ri-wallet-line"></i> <span data-key="t-transaction">Document Generator</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('transaction.list'))?>">
        <i class="ri-wallet-line"></i> <span data-key="t-transaction">AI Complaint Writer</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('transaction.list'))?>">
        <i class="ri-wallet-line"></i> <span data-key="t-transaction">Document Analyzer</span>
    </a>
</li>




<!-- <li class="nav-item">
    <a class="nav-link menu-link" href="#membership" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="membership">
        <i class="ri-inbox-line"></i> <span data-key="t-dashboards">Membership</span>
    </a>
    <div class="collapse menu-dropdown" id="membership">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('package.list'))?>" class="nav-link" data-key="t-analytics"> Packages </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('vendor-package.list'))?>" class="nav-link" data-key="t-analytics"> History </a>
            </li>
        </ul>
    </div>
</li> -->

<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Manage Other</span></li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('country.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Country</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('state.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">State</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('education.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Education</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('certification.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Certification</span>
    </a>
</li>



<li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Website</span></li>

<!-- <li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('banner.list'))?>">
        <i class="ri-image-line"></i> <span data-key="t-transaction">Banner</span>
    </a>
</li> -->
<!-- <li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('client-logo.list'))?>">
        <i class="ri-markup-line"></i> <span data-key="t-transaction">Post Brands</span>
    </a>
</li> -->

<!-- <li class="nav-item">
    <a class="nav-link menu-link" href="<?=base_url(route_to('city.list'))?>">
        <i class="ri-road-map-line"></i> <span data-key="t-transaction">Add Cities</span>
    </a>
</li> -->

<li class="nav-item">
    <a class="nav-link menu-link" href="#blog" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="blog">
        <i class="ri-newspaper-line"></i> <span data-key="t-dashboards">Manage Blog</span>
    </a>
    <div class="collapse menu-dropdown" id="blog">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('blog-category.list'))?>" class="nav-link" data-key="t-analytics"> Category </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('blog.list'))?>" class="nav-link" data-key="t-analytics"> Blog/News </a>
            </li>
        </ul>
    </div>
</li>









<li class="nav-item">
    <a class="nav-link menu-link" href="#setting" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="setting">
        <i class="ri-settings-3-line"></i> <span data-key="t-dashboards">Settings</span>
    </a>
    <div class="collapse menu-dropdown" id="setting">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <a href="<?=base_url(route_to('meta-tag.list'))?>" class="nav-link"> Meta Tags </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('script.index'))?>" class="nav-link"> Script </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('setting.policy'))?>" class="nav-link"> Policies </a>
            </li>
            <li class="nav-item">
                <a href="<?=base_url(route_to('setting.main'))?>" class="nav-link"> Social </a>
            </li>
        </ul>
    </div>
</li>

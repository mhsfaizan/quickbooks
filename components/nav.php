<!-- Dropdown Structure -->
<div class="navbar-fixed">
    <nav class="white ">
        <div class="my-container nav-wrapper">
            <a href="#" data-target="slide-out" class="sidenav-trigger m-0 primary-text"><i class="material-icons f-40">menu</i></a>
            <h1 class="m-0"><a href="/" class="brand-logo"><img src="/static/images/logo.png" /></a></h1>
            <ul class="right hide-on-med-and-down">
            <li><a class="text-dark" href="/">Home</a></li>
            <!-- <li><a class="text-dark" href="#">Product &amp; Pricing</a></li> -->
            <!-- Dropdown Trigger -->
            <li class="my-dropdown">
                <a  class="text-dark " href="#!">Product &amp; Pricing<i class="material-icons right">arrow_drop_down</i></a>
                    <ul  class="my-dropdown-content row p-2 white">
                            <li class="col l6">
                                <a href="/views/quicken-home-business">Quicken Home & Business</a>
                                <a href="/views/quicken-for-windows">Quicken For Windows</a>
                                <a href="/views/deluxe-for-windows">Deluxe for Windows</a>
                                <a href="/views/premier-for-windows">Premier for Windows</a>
                                <a href="/views/starter-for-windows">Starter for Windows</a>
                                
                            </li>
                            <li class="col l6">
                                <a href="/views/quicken-rental-property-management">Quicken Rental Property Management</a>
                                <a href="/views/quicken-for-mac">Quicken For Mac</a>
                                <a href="/views/quicken-deluxe-for-mac">Quicken Deluxe for Mac</a>
                                <a href="/views/quicken-premier-for-mac">Quicken Premier for Mac</a>
                                <a href="/views/quicken-starter-for-mac">Quicken Starter for Mac</a>
                            </li>
                    </ul>
                </li>
            <li><a class="text-dark" href="/views/about-quicken">About Quicken</a></li>
            <li><a class="text-dark" href="/views/support">Support</a></li>
            <li><a class="text-dark" href="/views/blogs">Blog</a></li>
            </ul>
        </div>
    </nav>
</div>



<!-- sidenav -->
<ul id="slide-out" class="sidenav primary">
    <li>
      <div class="background white p-2" >
        <img src="/static/images/logo.png">
      </div>
    </li>
    <li ><a href="/" class="white-text"><i class="material-icons white-text">home</i>Home</a></li>
    <li><a  class='dropdown-trigger white-text' href='#' data-target='dropdown1' ><i class="material-icons white-text">card_membership</i>Product &amp; Pricing</a></li>
    <li><a href="/views/about-quicken" class="white-text"><i class="material-icons white-text">person</i>About Quicken</a></li>
    <li><a href="/views/support" class="white-text"><i class="material-icons white-text">contact_support</i>Support</a></li>
    <li><a href="/views/blogs" class="white-text"><i class="material-icons white-text">forum</i>Blogs</a></li>
</ul>


 <!-- Dropdown Structure -->
 <ul id='dropdown1' class='dropdown-content'>
    <li><a href="/views/quicken-home-business">Quicken Home & Business</a></li>
    <li><a href="/views/quicken-for-windows">Quicken For Windows</a></li>
    <li><a href="/views/deluxe-for-windows">Deluxe for Windows</a></li>
    <li><a href="/views/premier-for-windows">Premier for Windows</a></li>
    <li><a href="/views/starter-for-windows">Starter for Windows</a></li>
    <li><a href="/views/quicken-rental-property-management">Rental Property Management</a></li>
    <li><a href="/views/quicken-for-mac">Quicken For Mac</a></li>
    <li><a href="/views/quicken-deluxe-for-mac">Quicken Deluxe for Mac</a></li>
    <li><a href="/views/quicken-premier-for-mac">Quicken Premier for Mac</a></li>
    <li><a href="/views/quicken-starter-for-mac">Quicken Starter for Mac</a></li>
 </ul>

<script>
    $(document).ready(()=>{
        $('.dropdown-trigger').dropdown();
        $('.sidenav').sidenav();
    })
</script>
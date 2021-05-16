<?php $currentURL = current_url();
?>
<div class="sidebar" id="sidebar"> <!-- sidebar -->
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                        <li class="menu-title">Main</li>
                        <li class="<?php if($currentURL =='dashboard.php'){echo 'active';}?>">
                            <a href="<?= base_url('index.php/DashboardC'); ?>"><i class="fa fa-tachometer" aria-hidden="true"></i> Dashboard</a>
                        </li>


               <li class="submenu">
  <a href="#"><i class="fa fa-home" aria-hidden="true"></i> <span>Home Page</span> <span class="menu-arrow"></span></a>
  <ul class="list-unstyled" style="display: none;">
 <li><a class="<?php if($currentURL == base_url("index.php/BannerC")){echo 'active';}?>" href="<?= base_url("index.php/BannerC") ?>">Banner</a></li>
 <li><a class="<?php if($currentURL == base_url("index.php/HomePage/CurrentProject")){echo 'active';}?>" href="<?= base_url("index.php/HomePage/CurrentProject") ?>">Current Projects</a></li>
 <li><a class="<?php if($currentURL == base_url("index.php/HomePage/LatestNewsView")){echo 'active';}?>" href="<?= base_url("index.php/HomePage/LatestNewsView") ?>">Latest News</a></li>
                </ul>
                </li>
                     


 <li class="submenu">
  <a href="#"><i class="fa fa-archive" aria-hidden="true"></i> <span>Our Story</span> <span class="menu-arrow"></span></a>
  <ul class="list-unstyled" style="display: none;">
 <li><a class="<?php if($currentURL == base_url("index.php/About/whoWeAre")){echo 'active';}?>" href="<?= base_url("index.php/About/MeetOurTeam") ?>">Who We Are ?</a></li>
 <li><a class="<?php if($currentURL == base_url("index.php/About/MeetOurTeam")){echo 'active';}?>" href="<?= base_url("index.php/About/MeetOurTeam") ?>">Meet Our Team</a></li>

                          </ul>
                </li>

        <li class="submenu">
  <a href="#"><i class="fa fa-child" aria-hidden="true"></i> <span>Our Cause</span> <span class="menu-arrow"></span></a>
  <ul class="list-unstyled" style="display: none;">
 <li><a class="<?php if($currentURL == base_url("index.php/OurCause/GreeningPlanet")){echo 'active';}?>" href="<?= base_url("index.php/OurCause/GreeningPlanet") ?>">Greening the Planet</a></li>
 <li><a class="<?php if($currentURL == base_url("index.php/OurCause/RecentActivites")){echo 'active';}?>" href="<?= base_url("index.php/OurCause/RecentActivites") ?>">Recent Activites </a></li> 

                          </ul>
                </li>
         
              

                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

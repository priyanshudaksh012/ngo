 <?php 
$R=$sgi->RecentActivites();
?> 
 <div class="charities__right">
            <div class="charities__right--contentBox">
                <p class="paragraph--1 charities__right--title">Recent Activities</p>
                <div class="charities__box">
                    <img src="admin/assets/ngo/<?= $R[0]['path'] ?>" alt="" class="charities__image">
                    <div class="charities__box--details">
                        <a href="#" class="charities__link paragraph--4"><?= $R[0]['heading'] ?></a>
                        <p class="paragraph--5 charities__date"><?= $R[0]['dates'] ?></p>
                    </div>
                </div>
                <div class="charities__box">
                    <img src="admin/assets/ngo/<?= $R[1]['path'] ?>" alt="" class="charities__image">
                    <div class="charities__box--details">
                        <a href="#" class="charities__link paragraph--4"><?= $R[1]['heading'] ?></a>
                        <p class="paragraph--5 charities__date"><?= $R[1]['dates'] ?></p>
                    </div>
                </div>
                <div class="charities__box">
                    <img src="admin/assets/ngo/<?= $R[2]['path'] ?>" alt="" class="charities__image">
                    <div class="charities__box--details">
                        <a href="#" class="charities__link paragraph--4"><?= $R[2]['heading'] ?></a>
                        <p class="paragraph--5 charities__date"><?= $R[2]['dates'] ?></p>
                        
                    </div>
                </div>
                <div class="charities__right--box">
                    <a href="#" class="charities__link paragraph--4 charities__right--link">Coming Soon</a>
                    <p class="paragraph--5 charities__date charities__right--date">
                        <?= $R[0]['coming_soon'] ?></p>
                </div>
                <div class="charities__right--box">
                    <a href="#" class="charities__link paragraph--4 charities__right--link">Coming Soon</a>
                    <p class="paragraph--5 charities__date charities__right--date"><?= $R[1]['coming_soon'] ?></p>
                </div>
                <div class="charities__right--box" style="margin-bottom: 0;">
                    <a href="#" class="charities__link paragraph--4 charities__right--link">Coming Soon</a>
                    <p class="paragraph--5 charities__date charities__right--date" style="margin-bottom: 0;"><?= $R[2]['coming_soon'] ?></p>
                </div>
            </div>

            <div class="charities__right--contentBox">
                <p class="paragraph--1 charities__right--title" style ="visibility: hidden;">Financials</p>
                <p class="charities__right--details paragraph--5">December 2019 <span>(127920)</span></p>
            </div>

            <div class="charities__right--contentBox">
                <p class="paragraph--1 charities__right--title" style ="visibility: hidden;" >Categories</p>
                <p class="charities__right--details paragraph--5">News <span>(4)</span></p>
            </div>

            <div class="charities__right--contentBox">
                <p class="paragraph--1 charities__right--title" style ="visibility: hidden;">Causes</p>

                <p class="charities__right--details paragraph--5">Sustainable Growth <span>(Recycle)</span></p>
                <p class="charities__right--details paragraph--5">Waste management <span>(Plastic waste)</span></p>
                <p class="charities__right--details paragraph--5">Tree Plantation <span>(12000 in 24 months)</span></p>
            </div>           
        </div>
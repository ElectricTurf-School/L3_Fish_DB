<div class="box nav">
            
            <div class="linkwrapper">
                <div class="commonsearches">
                    <a class="head_link" href="?page=results" title="View all fish">All fish</a> 
                    <a class="head_link" href="?page=search&action=recent" title="Selects 10 most recently added Fish">Recent</a> 
                    <a class="head_link" href="?page=search&action=random" title="Selects 10 random Fish">Random</a> 
                </div>  <!-- / common searches -->
            
                <div class="topsearch">
                    
                    <!-- Quick Search-->   
                    <style>
                        .search_grid {
                            width: auto;
                            height: 40px;
                            grid-template-areas:
                                "search submit"
                                "buttons buttons";
                            display: grid;
                        }
                    </style>
                    <form method="post" action="index.php?page=search" enctype="multipart/form-data" style="">
                        <div class="search_grid">
                            <input id="action" type="hidden" name="action" value="" />
                            <input class="search quicksearch" type="text" name="quick_search" size="40" value="" required placeholder="Quick Search..." />
                            <input class="submit" type="submit" name="find_quick" style="grid-area: submit;" value="&#xf002;" />
                            
                            <div style="grid-area: buttons; display: flex; justify-content: space-between; height: 20px; width: 260px; gap: 5px;">
                                <div class="category"><button class="category_button" id="all" value="all" type="button">ALL</button></div>
                                <div class="category"><button class="category_button" id="name" value="search" type="button">NAME</button></div>
                                <div class="category"><button class="category_button" id="country" value="country" type="button">COUNTRY</button></div>
                                <div class="category"><button class="category_button" id="lifetime" value="lifetime" type="button">LIFETIME</button></div>
                                <div class="category"><button class="category_button" id="description" value="description" type="button">DESCRIPTION</button></div>
                                
                            </div>
                        </div>
                    </form>
                </div>  <!-- / top search -->
                
                <div class="button-link topadmin">
                    <?php  if (isset($_SESSION['admin'])) { ?>
                        
                       <a href="index.php?page=../admin/add_fish">
                       <i class="fa fa-plus fa-2x"></i>
                       </a>
                       &nbsp;&nbsp;
                       <a href="https://projectspace.nz/amyxrilg/DTI301/L3_Fish_DB/admin/logout.php">
                            <i class="fa fa-sign-out fa-2x"></i>
                        </a> 
                       
 
                    <?php } 
                    else {
                        ?> 
                            <a href="index.php?page=../admin/login">
                                <i class="fa fa-sign-in fa-2x"></i> 
                            </a>
                        <?php
                    }
                    ?>                    
                </div>  <!-- / top admin -->
                
            </div>  <!--- / link wrapper -->
            
        </div>    <!-- / nav -->        
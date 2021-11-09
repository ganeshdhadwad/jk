<?php
   include("includes/db/database.php"); 
   $catseo = $_GET['catseo'];
   $postseo = $_GET['postseo'];
   //get cat id
   $mediacatid = $db->prepare("SELECT * FROM coverage_type WHERE coveragetypeseoname = :coveragetypeseoname");
   $mediacatid->bindParam(":coveragetypeseoname", $catseo);
   $mediacatid->execute();
   //fetch id
   $fid = $mediacatid->fetch(PDO::FETCH_ASSOC);
   $catid = $fid['ctypeid'];
   $coveragetypename = $fid['coveragetypename'];
   //now get post from the table
   $getcpost = $db->prepare("SELECT * FROM coverage WHERE coverage_seo_url = :coveragetype AND status = :status");
   $getcpost->bindParam(":coveragetype", $postseo);
   $getcpost->bindParam(":status", $status);
   $getcpost->execute();
   //count 
   $postcount = $getcpost->rowCount();
   $rowf = $getcpost->fetch(PDO::FETCH_ASSOC);
   $coverageid = $rowf['coverageid'];
   $coverage_head = $rowf['coverage_head'];
   $coverage_desc = $rowf['coverage_desc'];
   $coverage_img = $rowf['coverage_img'];
   $created = $rowf['created'];
   $datef = date('F j, Y', $created);
   $coverage_seo_url = $rowf['coverage_seo_url'];
   $coverage_main_url = $rowf['coverage_url'];
?>
<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
<head>
      <?php
         include("includes/common/meta.php"); 
      ?>
   </head>
   <body class="blog right-sidebar single single-post">
      <div id="page" class="hfeed site">
         <?php
            include("includes/common/header.php"); 
         ?>
         <div id="content" class="site-content" tabindex="-1" >
            <div class="col-full">
               <div class="pizzaro-breadcrumb">
                  <nav class="woocommerce-breadcrumb" itemprop="breadcrumb">
                     <a href="<?php echo $path; ?>">Home</a>
                     <span class="delimiter"><i class="po po-arrow-right-slider"></i></span>Media
                     <span class="delimiter"><i class="po po-arrow-right-slider"></i></span><?php echo $coveragetypename; ?>
                     <span class="delimiter"><i class="po po-arrow-right-slider"></i></span><a href="<?php echo $path.'media/'.$onlinetag.'/'.$coverage_seo_url; ?>"><?php echo $coverage_head; ?></a>
                  </nav>
               </div>
               <!-- .woocommerce-breadcrumb -->
               <div id="primary" class="content-area">
                  <main id="main" class="site-main" >
                     <article id="post-359" class="post-359 post type-post status-publish format-image has-post-thumbnail hentry category-technology tag-event tag-festival tag-music tag-woocommerce post_format-post-format-image">
                        <header class="entry-header">
                           <div class="media-attachment">
                              <div class="post-thumbnail">
                                 <img width="1619" height="827" src="<?php echo $path.'uploads/'.$coverage_img; ?>" class="attachment-full size-full wp-post-image" alt="" />
                              </div>
                           </div>
                           <h1 class="entry-title"><?php echo ucfirst($coverage_head); ?></h1>
                           <div class="entry-meta">
                              <div class="cat-links">
                                 <a href="#" rel="category tag"><?php echo $onlinetag; ?></a>
                              </div>
                              <span class="posted-on">
                              <a href="#" rel="bookmark">
                              <time class="entry-date published" datetime="2016-10-13T14:53:25+00:00"><?php echo $datef; ?></time>
                              </a>
                              </span>
                              <div class="author">
                                 <div class="label">Posted by:</div>
                                 <a href="#" title="Posts by Jumboking" rel="author">Jumboking</a>
                              </div>
                           </div>
                        </header>
                        <!-- .entry-header -->
                        <div class="entry-content">
                           <p class="highlight"><?php echo $coverage_desc; ?></p>
                        </div>
                        <!-- .entry-content -->
                        <?php 
                           if($coverage_main_url == ''){

                           }else{
                        ?>
                        <nav id="post-navigation" class="navigation post-navigation"  aria-label="Post Navigation">
                           <span class="screen-reader-text">Post navigation</span>
                           <div class="nav-links">
                              <div class="nav-next">
                                 <a href="<?php echo $coverage_main_url; ?>" target="_blank">View Online Article</a>
                              </div>
                           </div>
                        </nav>
                        <?php       
                           }
                        ?>
                        
                        <section id="comments" class="comments-area" aria-label="Post Comments" style="display: none;">
                           <div id="respond" class="comment-respond">
                              <span id="reply-title" class="gamma comment-reply-title">Leave a Reply
                              <small>
                              <a rel="nofollow" id="cancel-comment-reply-link" href="#" style="display:none;">Cancel reply</a>
                              </small>
                              </span>
                              <form  id="commentform" class="comment-form" novalidate>
                                 <p class="comment-notes">
                                    <span id="email-notes">Your email address will not be published.</span> Required fields are marked <span class="required">*</span>
                                 </p>
                                 <p class="comment-form-comment">
                                    <label for="comment">Comment</label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"></textarea>
                                 </p>
                                 <p class="comment-form-author">
                                    <label for="author">Name <span class="required">*</span></label>
                                    <input id="author" name="author" type="text" value="" size="30" maxlength="245" aria-required='true' required='required' />
                                 </p>
                                 <p class="comment-form-email">
                                    <label for="email">Email <span class="required">*</span></label>
                                    <input id="email" name="email" type="email" value="" size="30" maxlength="100" aria-describedby="email-notes" aria-required='true' required='required' />
                                 </p>
                                 <p class="comment-form-url">
                                    <label for="url">Website</label>
                                    <input id="url" name="url" type="url" value="" size="30" maxlength="200" />
                                 </p>
                                 <p class="form-submit">
                                    <input name="submit" type="submit" id="submit" class="submit" value="Post Comment" />
                                    <input type='hidden' name='comment_post_ID' value='359' id='comment_post_ID' />
                                    <input type='hidden' name='comment_parent' id='comment_parent' value='0' />
                                 </p>
                              </form>
                           </div>
                           <!-- #respond -->
                        </section>
                        <!-- #comments -->
                     </article>
                     <!-- #post-## -->
                  </main>
                  <!-- #main -->
               </div>
               <!-- #primary -->
               <?php
                  include("includes/common/blog-right-sidebar.php");
               ?>
               <!-- #secondary -->
            </div>
            <!-- .col-full -->
         </div>
         <!-- #content -->
         <?php
            include("includes/common/whatsapp-chat.php"); 
            include("includes/common/footer.php"); 
         ?>
         <!-- #colophon -->
      </div>
      <!-- Return to Top -->
      <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/tether.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/bootstrap.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/owl.carousel.min.js"></script>
      
      <script type="text/javascript" src="<?php echo $assets; ?>js/social.share.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script type="text/javascript" src="<?php echo $assets; ?>js/scripts.min.js"></script>

   <!-- Plugin JS file -->
   <script src="<?php echo $assets; ?>plugin/components/moment/moment.min.js"></script>
   <!--<script src="<?php echo $assets; ?>plugin/components/moment/moment-timezone-with-data.min.js"></script>-->
   <script src="<?php echo $assets; ?>plugin/components/moment/moment-timezone-with-data-10-year-range.min.js"></script>
   <script src="<?php echo $assets; ?>plugin/whatsapp-chat-support.js"></script>
   <script>

      $('#jumboking-whatsapp-chat').whatsappChatSupport({
         defaultMsg : '',
      });

      // ===== Scroll to Top ==== 
      $(window).scroll(function() {
          if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
              $('#return-to-top').fadeIn(200);    // Fade in the arrow
          } else {
              $('#return-to-top').fadeOut(200);   // Else fade out the arrow
          }
      });
      $('#return-to-top').click(function() {      // When arrow is clicked
          $('body,html').animate({
              scrollTop : 0                       // Scroll to top of body
          }, 500);
      });
   </script>
   </body>
</html>

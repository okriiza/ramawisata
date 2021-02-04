<script src="{{ url('frontend/assets/plugin/jquery/jquery-3.5.1.min.js')}}"></script>
<script src="{{ url('frontend/assets/plugin/jquery/popper.min.js')}}"></script>
<script src="{{ url('frontend/assets/bootstrap/js/bootstrap.js')}}"></script>
<script src="{{ url('frontend/assets/plugin/fontawesome/js/all.js')}}"></script>
<script src="{{ url('frontend/assets/plugin/slick/slick.js')}}"></script>
<script src="{{ url('frontend/assets/plugin/nanogallery2/jquery.nanogallery2.min.js')}}"></script>
<script type="text/javascript">
   $('.center').slick({
   dots: true,
   infinite: false,
   speed: 300,
   slidesToShow: 4,
   slidesToScroll: 4,
   responsive: [
      {
         breakpoint: 1024,
         settings: {
         slidesToShow: 3,
         slidesToScroll: 3,
         infinite: true,
         dots: true
         }
      },
      {
         breakpoint: 600,
         settings: {
         slidesToShow: 2,
         slidesToScroll: 2
         }
      },
      {
         breakpoint: 480,
         settings: {
         slidesToShow: 1,
         slidesToScroll: 1
         }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
   ]
   });
</script>
<script>
   $("#my_nanogallery2").nanogallery2({

      
      // GALLERY AND THUMBNAIL LAYOUT
      galleryMosaic : [                       // default layout
         { w: 2, h: 2, c: 1, r: 1 },
         { w: 1, h: 1, c: 3, r: 1 },
         { w: 1, h: 1, c: 3, r: 2 },
         { w: 1, h: 2, c: 4, r: 1 },
         { w: 2, h: 1, c: 5, r: 1 },
         { w: 2, h: 2, c: 5, r: 2 },
         { w: 1, h: 1, c: 4, r: 3 },
         { w: 2, h: 1, c: 2, r: 3 },
         { w: 1, h: 2, c: 1, r: 3 },
         { w: 1, h: 1, c: 2, r: 4 },
         { w: 2, h: 1, c: 3, r: 4 },
         { w: 1, h: 1, c: 5, r: 4 },
         { w: 1, h: 1, c: 6, r: 4 }
      ],
      galleryMosaicXS : [                     // layout for XS width
         { w: 2, h: 2, c: 1, r: 1 },
         { w: 1, h: 1, c: 3, r: 1 },
         { w: 1, h: 1, c: 3, r: 2 },
         { w: 1, h: 2, c: 1, r: 3 },
         { w: 2, h: 1, c: 2, r: 3 },
         { w: 1, h: 1, c: 2, r: 4 },
         { w: 1, h: 1, c: 3, r: 4 }
      ],
      galleryMosaicSM : [                     // layout for SM width
         { w: 2, h: 2, c: 1, r: 1 },
         { w: 1, h: 1, c: 3, r: 1 },
         { w: 1, h: 1, c: 3, r: 2 },
         { w: 1, h: 2, c: 1, r: 3 },
         { w: 2, h: 1, c: 2, r: 3 },
         { w: 1, h: 1, c: 2, r: 4 },
         { w: 1, h: 1, c: 3, r: 4 }
      ],
      galleryMaxRows: 1,
      galleryDisplayMode: 'rows',
      gallerySorting: 'random',
      thumbnailDisplayOrder: 'random',

      thumbnailHeight: '180', thumbnailWidth: '220',
      thumbnailAlignment: 'scaled',
      thumbnailGutterWidth: 0, thumbnailGutterHeight: 0,
      thumbnailBorderHorizontal: 0, thumbnailBorderVertical: 0,

      thumbnailToolbarImage: null,
      thumbnailToolbarAlbum: null,
      thumbnailLabel: { display: false },

      // DISPLAY ANIMATION
      // for gallery
      galleryDisplayTransitionDuration: 1500,
      // for thumbnails
      thumbnailDisplayTransition: 'imageSlideUp',
      thumbnailDisplayTransitionDuration: 1200,
      thumbnailDisplayTransitionEasing: 'easeInOutQuint',
      thumbnailDisplayInterval: 60,

      // THUMBNAIL HOVER ANIMATION
      thumbnailBuildInit2: 'image_scale_1.15',
      thumbnailHoverEffect2: 'thumbnail_scale_1.00_1.05_300|image_scale_1.15_1.00',
      touchAnimation: true,
      touchAutoOpenDelay: 500,

      // LIGHTBOX
      viewerToolbar: { display: false },
      viewerTools:    {
         topLeft:   'label',
         topRight:  'shareButton, rotateLeft, rotateRight, fullscreenButton, closeButton'
      },

      // GALLERY THEME
      galleryTheme : { 
         thumbnail: { background: '#111' },
      },
            
      // DEEP LINKING
      locationHash: true
   });
</script>
<script>
   $("#nanogallery").nanogallery2({
         
         // GALLERY AND THUMBNAIL LAYOUT
         thumbnailHeight: '275', thumbnailWidth: 'auto',
         galleryDisplayMode: 'pagination',                 // gallery pagination mode
         galleryMaxRows: 2,                                
         gallerySorting: 'random',
         thumbnailAlignment: 'fillWidth',
         thumbnailL1GutterWidth: 20,
         thumbnailL1GutterHeight: 20,
         thumbnailBorderHorizontal: 1,
         thumbnailBorderVertical: 1,

         // THUMBNAIL TOOLS & LABEL
         thumbnailL1Label: { display: true, position:'overImageOnTop', hideIcons: true, titleFontSize: '1.5em', align: 'left'},
         thumbnailToolbarImage :  { topLeft: 'select', bottomRight : 'featured,display' },

         // DISPLAY ANIMATION
         thumbnailDisplayTransition: 'flipUp',       // thumbnail display animation
         thumbnailDisplayTransitionDuration: 400,
         thumbnailDisplayInterval: 200,
         thumbnailDisplayOrder: 'rowByRow',

         // THUMBNAIL'S HOVER ANIMATION
         thumbnailHoverEffect2: 'toolsSlideUp|labelSlideDown',
         touchAnimation: true,
         touchAutoOpenDelay: -1,

         // GALLERY THEME
         galleryTheme : { 
         thumbnail: { titleShadow : 'none', descriptionShadow : 'none', titleColor: '#fff', borderColor: '#fff' },
         navigationPagination :  { background: '#dc3545', color: '#fff', colorHover: '#aaa', borderRadius: '4px' },
         },
                  
         // DEEP LINKING
         locationHash: false
      });
      
   
   
</script>
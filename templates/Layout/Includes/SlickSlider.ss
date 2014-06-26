<div class="sliderContainer">
<% loop AllChildren %>
 <div class="imageCaptionContainer">
 <a href="$Link"><img class="shadowbox sliderImage" data-interchange="[$Photo.SetHeight(480).URL, (default)],[$Photo.SetHeight(480).URL, (medium)],[$Photo.SetHeight(480).URL, (large)], [$Photo.SetHeight(480).URL, (small)]">
<noscript><img src="$Photo.SetHeight(330).URL"></noscript></a>
    <div class="sliderCaption">$Caption</div>
  </div>
 
<% end_loop %>
</div>
 
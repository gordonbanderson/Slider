<% cached ID, LastEdited,Locale,$CacheKey('homepagesliderfullwidth','ChildPage') %>
<div class="sliderContainer">
<% loop AllChildren %>
 <div class="imageCaptionContainer">
 <a href="$Link">
 <figure>
 <img class="shadowbox sliderImage" data-interchange="[$Photo.CroppedFocusedImage(720,360).URL, (default)],[$Photo.CroppedFocusedImage(720,360).URL, (medium)],[$Photo.CroppedFocusedImage(720,360).URL, (large)], [$Photo.CroppedFocusedImage(720,360).URL, (small)]"/>
<noscript><img src="$Photo.CroppedFocusedImage(6000,300).URL"></noscript>
    <figcaption class="sliderCaption">$Caption</figcaption>
    </a>
  </div>
<% end_loop %>
</div>
 <% end_cached %>
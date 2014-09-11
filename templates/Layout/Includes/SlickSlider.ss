<% cached ID, LastEdited,Locale,$CacheKey('homepagesliderfullwidth','ChildPage') %>
<h2>Test slider</h2>
<div class="sliderContainer">
<% loop AllChildren %>
 <div class="imageCaptionContainer">
 <a href="$Link">
 <figure>
 <img class="shadowbox sliderImage" data-interchange="[$Photo.CroppedFocusedImage(870,435).URL, (default)],[$Photo.CroppedFocusedImage(640,320).URL, (small)],[$Photo.CroppedFocusedImage(870,435).URL, (medium)],[$Photo.CroppedFocusedImage(870,435).URL, (large)]"/>
<noscript><img src="$Photo.CroppedFocusedImage(600,300).URL"></noscript>
    <figcaption class="sliderCaption">$Caption</figcaption>
    </a>
  </div>
<% end_loop %>
</div>
 <% end_cached %>
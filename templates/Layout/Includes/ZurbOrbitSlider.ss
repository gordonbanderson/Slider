<ul class="slider" data-orbit data-options="timer_speed: 4000; animation_speed=1000; bullets: false; animation: fade; timer: true;">
<% loop AllChildren %>
 <li>
 <a href="$Link"><img class="shadowbox" data-interchange="[$Photo.SetWidth(720).URL, (default)],[$Photo.SetWidth(720).URL, (medium)],[$Photo.SetWidth(720).URL, (large)], [$Photo.SetWidth(640).URL, (small)]">
<noscript><img src="$Photo.SetWidth(640).URL"></noscript></a>
    <div class="orbit-caption">T1 $Caption</div>
  </li>
 
<% end_loop %>
</ul>
 
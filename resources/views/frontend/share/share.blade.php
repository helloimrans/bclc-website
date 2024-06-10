<div class="pl-share-btn mt-3">
    <h6>Shere Now:</h6>
    <a href="https://mail.google.com/mail/?view=cm&fs=1&su=Place%20Order&body={{ urlencode(Request::url()) }}" target="_blank" class="share-gmail" title="Share via Gmail">
        <i class='fa fa-envelope-o'></i>
    </a>
    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::url()) }}" target="_blank" class="share-facebook" title="Share via Facebook">
        <i class='fa fa-facebook'></i>
    </a>
    <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(Request::url()) }}" target="_blank" class="share-linkedin" title="Share via LinkedIn">
        <i class='fa fa-linkedin'></i>
    </a>
    <a href="https://web.whatsapp.com/send?text={{ urlencode(Request::url()) }}" target="_blank" class="share-whatsapp" title="Share via Whatsapp">
        <i class='fa fa-whatsapp'></i>
    </a>
</div>

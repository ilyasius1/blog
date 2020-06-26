<div class="comment clearfix">
    <div class="comment-avatar pull-left">
        <img src="../assets/images/dummy/about-5.jpg" alt="User Avatar" class="img-circle comment-avatar-image">
    </div>
    <div class="comment-body clearfix">
        <div class="comment-header">
            <strong class="primary-font">{{ $item['user']['fullname'] }}</strong>
            <small class="pull-right text-muted">
                <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;{{ $item['time'] }}
            </small>
        </div>
        <p class="comment-text">
            {{ $item['text'] }}
        </p>
    </div>
</div>
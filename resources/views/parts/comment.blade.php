
<div class="comment clearfix">
    <div class="comment-avatar pull-left">
        <img src="{{ $comment['user']['avatar']?? '/assets/images/dummy/about-5.jpg' }}" alt="User Avatar" class="img-circle comment-avatar-image">
    </div>
    <div class="comment-body clearfix">
        <div class="comment-header">
            <strong class="primary-font">{{ $comment['user']['fullname'] }}</strong>
            <small class="pull-right text-muted">
                <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;{{ dateRu('d F Y H:i', $comment['time'], true) }}
            </small>
        </div>
        <p class="comment-text">
            {{ $comment['text'] }}
        </p>
    </div>
</div>


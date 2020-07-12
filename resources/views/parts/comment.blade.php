
<div class="comment clearfix">
    <div class="comment-avatar pull-left">
        <img src="{{ $comment->user->profile->avatar ?? '/assets/images/dummy/about-5.jpg' }}" alt="User Avatar" class="img-circle comment-avatar-image">
    </div>
    <div class="comment-body clearfix">
        <div class="comment-header">
            <strong class="primary-font">{{ $comment->user->profile->fullname }}</strong>
            <small class="pull-right text-muted">
                <span class="glyphicon glyphicon-time"></span>&nbsp;&nbsp;{{ dateRu($comment->created_at, 'd F Y H:i:s') }}
            </small>
        </div>
        <p class="comment-text">
            {{ $comment->text }}
        </p>
    </div>
</div>


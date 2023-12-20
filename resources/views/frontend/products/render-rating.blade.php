@forelse($product->reviews as $review)
<div class="reviews__comment--list d-flex">
    <div class="reviews__comment--thumbnail">
        <p class="user-short-name">
            {{ltrim($review->name)[0] ?? 'U'}}
        </p>
    </div>
    <div class="reviews__comment--content">
        <h4 class="reviews__comment--content__title">{{$review->name}}</h4>
        <div class="rating reviews__comment--rating d-flex mb-5">
            @for($i = 1 ; $i <= (int)$review->rating; $i++)
            <i class="fas fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
            @endfor
            @for($i = 1 ; $i <= (int) 5 - $review->rating; $i++)
            <i class="far fa-star fa-sm mr-2" style="color: rgb(250 204 21);"></i>
            @endfor
        </div>
        <p class="reviews__comment--content__desc">{{$review->content}}</p>
        <span class="reviews__comment--content__date">{{$review->created_at->diffForHumans()}}</span>
        <div class="text-right">
            <button class="text-red-600">Reply</button>
        </div>
    </div>
</div>
<!-- replay comment -->
<div class="reviews__comment--list reply-on-review-admin margin__left flex gap-10" style="display: none;">
    
    <div id="writereview" class="reviews__comment--reply__area col-10">
        <form id="ReplyOnReviewForm" action="{{route('review.replay')}}" method="post">
            @csrf
            <input type="hidden" name="review_id" value="{{$review->id}}">
            <div class="mb-5">
                <textarea class="reviews__comment--reply__textarea" placeholder="Your Reply...." name="content" required></textarea>
            </div> 
            <button type="submit" class="bg-red-600 text-white px-7 py-4 leading-none rounded-lg hover:bg-black transition">SUBMIT</button>
        </form>   
    </div> 
</div>

@forelse($review->replys as $reply)
<div class="reviews__comment--list margin__left d-flex">
    <div class="reviews__comment--thumbnail">
        <img src="https://cdn-icons-png.flaticon.com/128/9322/9322043.png" alt="comment-thumbnail">
    </div>
    <div class="reviews__comment--content">
        <h4 class="reviews__comment--content__title">Admin</h4>
        
        <p class="reviews__comment--content__desc">{{$reply->content}}</p>
        <span class="reviews__comment--content__date">{{$reply->created_at->diffForHumans()}}</span>
        
    </div>
</div>
@empty
@endforelse

@empty
@endforelse
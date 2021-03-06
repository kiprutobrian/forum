 <reply :attributes="{{$reply}}" inline-template v-cloak>
    <div id="reply-{{ $reply->id }}" class="card">
        <div class="card-header">
            <div class="level">
                <h5 class="flex">
                    <a href="{{ route('profile',$reply->owner) }}">{{ $reply->owner->name }} </a> said {{ $reply->created_at->diffForHumans() }}...
                </h5>
                <div>
                    <form action="/replies/{{ $reply->id }}/favorites" method="post">
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-block btn-primary">
                            <i class="fa fa-heart" style="font-size:14px;color:red"></i>
                            {{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count) }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div v-if="editing">
                <div class="form-group">
                    <textarea class="form-control" v-model="body"></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" @click="update">Update</button>
                <button type="submit" class="btn btn-link btn-sm" @click="editing = false">Cancel</button>
            </div>
            <div v-else v-text="body">
            </div>
        </div>

        @can('update', $reply)
            <div class="card-footer level">
                <button type="submit" class="btn btn-info btn-sm mr-1" @click="editing=true">
                    <a><i class="fa fa-edit fa-sm"></i> Edit</a>
                </button>
                <button type="submit" class="btn btn-danger btn-sm mr-1" @click="destroy">
                    <a><i class="fa fa-trash fa-sm"></i> Delete</a>
                </button>
            </div>
        @endcan
    </div>
</reply>

<div class="h-full overflow-y-auto space-y-1 p-1">


    @foreach($lists as $list)
        @if($list->children->isEmpty())
            <x-common.list.list-item
                :route="$list->route"
                :link="$list->link"
                :icon="$list->icon"
                :title="$list->title"
                :item-style="$itemStyle"
                :icon-style="$iconStyle"
                :title-style="$titleStyle"
            />
        @else
            <x-common.list.list-group
                :route="$list->route"
                :icon="$list->icon"
                :title="$list->title"
                :children="$list->children"
                :class="$itemStyle"
                :icon-style="$iconStyle"
                :title-style="$titleStyle"
            />
        @endif
    @endforeach
</div>

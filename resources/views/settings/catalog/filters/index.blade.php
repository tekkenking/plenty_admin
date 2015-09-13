@extends('layouts.master')

@section('title', $title)
@section('page-header', $pageheader)

@section('content')

<div class="row">
	<div class="col-md-18">
		<div class="nav-tabs-custom">
			<ul id="filtertab" class="nav nav-tabs" role="tablist">
                <li class="active">
                	<a data-toggle="tab" href="#item-list-category-tab" data-url="{!!route('filtersubcategory.show', ['id'=>$subcat->id])!!}" aria-expanded="true">Filter List </a>
                </li>

                <li class="">
                	<a data-toggle="tab" href="#item-create-category-tab" data-url="{!!route('filtersubcategory.create', ['id'=>$subcat->id])!!}" aria-expanded="false">Create Filter</a>
                </li>

            </ul>

            <div class="tab-content">
				<div id="item-list-category-tab" class="tab-pane active">
		           {!!$tab_content or "Nothing" !!}
		        </div>

            </div>
		</div>
	</div>
</div>


<script type="text/javascript">
$(function(){
	$('a[data-toggle="tab"]').ajaxtab();
});
</script>

@endsection
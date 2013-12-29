@if ($paginator->getLastPage() > 1)

	<div class="pagination-centered">
		<ul class="pagination">

			@if ($paginator->getCurrentPage() > 1)
				<li class="arrow"><a href="?page={{ $paginator->getCurrentPage() - 1 }}">&laquo;</a></li>
			@else
				<li class="arrow unavailable"><a href="">&laquo;</a></li>
			@endif

			@for ($i = 1; $i <= $paginator->getLastPage(); $i++)
				@if($i == $paginator->getCurrentPage())
					<li class="current"><a href="">{{ $i }}</a></li>
				@else
					<li><a href="?page={{ $i }}">{{ $i }}</a></li>
				@endif
			@endfor

			@if ($paginator->getCurrentPage() < $paginator->getLastPage())
	                        <li class="arrow"><a href="?page={{ $paginator->getCurrentPage() + 1 }}">&raquo;</a></li>
        	        @else
                	        <li class="arrow unavailable"><a href="">&raquo;</a></li>
	                @endif

		</ul>
	</div>
@endif

@if ($paginator->getLastPage() > 1)

	<?php
		$maxPages = 10;

		$startPage = round($paginator->getCurrentPage() - $maxPages / 2);
		if($startPage < 1)
			$startPage = 1;

		$endPage = $startPage + $maxPages;
		if($endPage > $paginator->getLastPage())
			$endPage = $paginator->getLastPage();

	?>

	<div class="pagination-centered">
		<ul class="pagination">

			@if ($paginator->getCurrentPage() > 1)
				<li class="arrow"><a href="?page={{ $paginator->getCurrentPage() - 1 }}">&laquo;</a></li>
			@else
				<li class="arrow unavailable"><a href="">&laquo;</a></li>
			@endif

			@if($startPage > 1)
				<li><a href="?page=1">1</a></li>
				<li class="unavailable"><a href="">&hellip;</a></li>
			@endif

			@for ($i = $startPage; $i <= $endPage; $i++)
				@if($i == $paginator->getCurrentPage())
					<li class="current"><a href="">{{ $i }}</a></li>
				@else
					<li><a href="?page={{ $i }}">{{ $i }}</a></li>
				@endif
			@endfor

			@if($endPage < $paginator->getLastPage())
				<li class="unavailable"><a href="">&hellip;</a></li>
				<li><a href="?page={{$paginator->getLastPage()}}">{{$paginator->getLastPage()}}</a></li>
			@endif

			@if ($paginator->getCurrentPage() < $paginator->getLastPage())
	                        <li class="arrow"><a href="?page={{ $paginator->getCurrentPage() + 1 }}">&raquo;</a></li>
        	        @else
                	        <li class="arrow unavailable"><a href="">&raquo;</a></li>
	                @endif

		</ul>
	</div>
@endif

<div>
    <header class="app-header header-search bg-primary">
        <a href="javascript:history.go(-1)" class="btn-header"><i data-eva="arrow-back" data-eva-fill="#fff"></i></a>
        <input type="text" autofocus placeholder="Search" class="form-control input-dark border-0">
    </header> <!-- section-header.// -->
    <main class="app-content">

        <section class="padding-x">
            <h6 class="title-sm">Pencarian Sebelumnya</h6>

            <ul class="list-search-suggestion">
                <li>
                    <a href="#" class="text"> New clothes </a>
                    <a href="#" class="btn-control float-right"> <i class="fa fa-times"></i> </a>
                </li>
                <li>
                    <a href="#" class="text"> Nike shoes for men </a>
                    <a href="#" class="btn-control float-right"> <i class="fa fa-times"></i> </a>
                </li>
                <li>
                    <a href="#" class="text"> Some previous search </a>
                    <a href="#" class="btn-control float-right"> <i class="fa fa-times"></i> </a>
                </li>
                <li>
                    <a href="#" class="text"> Great list item </a>
                    <a href="#" class="btn-control float-right"> <i class="fa fa-times"></i> </a>
                </li>
            </ul>


            <h6 class="title-sm">Pencarian Kategori</h6>

            @foreach($categories as $category)
                <a href="{{url('list/'.$category->kategori)}}" class="btn btn-light text-left mb-2"> <span
                        class="text">{{$category->kategori}}</span> <i
                        class="icon fa fa-chevron-right"></i> </a>
            @endforeach


        </section>

    </main>
</div>

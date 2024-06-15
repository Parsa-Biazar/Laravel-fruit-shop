<header id="header">
        <section class="header-sec">
            <section class="head-pic-text">
                @section('top-pic')
                <div class="pic-div">
                    <figure class="head-pic-fig">
                        <img class="head-pic-img" src="image/77859db9a0c081e1f982861d6db8725d.1000x323x1.jpg"
                             alt="dorcci-picture">
                    </figure>
                    <div class="head-text-btn">
                        <h1 class="head-pic-h1 text-center">Parsa Biazar<br>

                        </h1>
                        <p class="head-text">توسعه دهنده ی انتهای پشت (back-end developer)</p>
                        @if(\Auth()->user())
                            <p style="cursor: pointer" class="uncopyable m-0 me-2 text-white">خوش آمدید "{{Auth()->user()->name}}"</p>
                        <a href="{{route('login')}}" class="head-btn img-radius">ورود به پنل ادمین</a>
                        @else
                        <a href="{{route('register')}}" class="head-btn img-radius">عضویت در سایت ما !</a>
                        @endif
                    </div>
                </div>
                @show
                <section class="head-text-sec">
                    <div class="sign-buy-div">
                        <div class="dropdown">
                            <span>ورود/عضویت</span>
                            <div class="dropdown-content">
                                <a href="{{route('register')}}" class="dropdown-item">عضویت</a>
                                <a href="{{route('login')}}" class="dropdown-item">ورود</a>
                            </div>
                        </div>
                        <button class="shop-btn">
                            <svg xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                                 xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#"
                                 xmlns:dc="http://purl.org/dc/elements/1.1/" id="svg2" height="30px" width="30px"
                                 version="1.1" viewBox="0 0 688 609">
                                <path id="path4"
                                      d="m26.025 4.2012c-0.904-0.0128-1.817 0.0191-2.738 0.0996-16.887 3.475-27.712 33.137-9.574 42.137 14.862 4.937 30.013 21.937 46.15 11.212 7.35-9.687 16.874-28.713 3.461-37.363-12-5.695-23.735-15.894-37.299-16.086zm46.375 27.399c1.125 5.837-3.424 11.337-3.224 16.625 16.862 9.437 33.824 18.774 50.574 28.412 2.47 17.162 5.11 37.113 4.22 53.073-21.75-21.35-42.695-45.998-64.445-68.323-6.887 1.475-14.088 2.538-20.863-0.037 23.125 27.437 49.001 53.14 73.118 79.6 21.36 115.79 40.31 232.02 61.88 347.77-32.09 5.79-67.29 21.88-78.586 55.14-12.637 36.87 6.656 74.19 23.786 105.94-28.759 17.9-35.298 62.33-12.26 87.35 16.84 21.54 49.64 26.79 73.21 13.85 27.84-14.31 39.49-52.35 24.05-79.76-1.93-2.82-3.96-5.57-6.06-8.27 2.1 2.7 4.13 5.45 6.06 8.27 113.22 0.24 226.9-0.34 340.17 0.23-21.34 36.93 10.31 89.95 53.38 86.17 42.61 2.48 72.48-49.85 51.56-86.63 12.58 2.28 25.93-1.99 38.67 1.49 1.18-5.25 4.85-13.72 0.48-17.54-4.32-0.03-8.65-0.04-12.98-0.04-12.98-0.01-25.96 0.1-38.93 0.18-21.65-20.45-57.87-19.76-79.83 0-60.86-0.09-121.71-0.13-182.56-0.12-60.85 0-121.71 0.04-182.56 0.11-14.81-13.51-37.15-18.8-56.27-12.55-19.08-27.33-34.58-62.04-24.34-95.68 9.15-23.32 33.79-33.47 56-40.37 59.38-0.68 118.83 0.07 178.23-0.31 0.52-5.32 0.16-10.71 0.07-16.02-51.45-0.47-102.94 0.05-154.4-0.17-2.92-0.9-1.81-4.02-1.71-6.27 208.89-2.7 417.92-2.78 626.84-4.96 15.18-109.49 25.4-220 39.13-329.82-236.87-25.39-473.95-49.691-710.97-73.553-20.03-17.063-47.29-30.162-71.44-43.787zm73.65 51.201c19.96 2.05 39.85 5.112 59.91 6.25 2.08 29.089 4.07 58.199 6.38 87.269 0.71 5.34-9.98 2.98-9.69-1.26-19.11-30.52-39.79-60.61-56.6-92.259zm69.25 7.449c23.04 2.35 46.5 4.05 69.32 8.025 1.43 28.515 1.34 57.275 5.43 85.535-22.9 2.41-46.84-2.06-69.96-4.22-0.24-29.35-6.05-61.5-4.79-89.34zm-86.49 2.449c18.31 20.901 31.76 49.751 48.64 73.451 2.22 3.7 10.25 14.46-0.89 11.11-12.85-2.17-26.55-0.03-39.06-3.71-2.42-26.87-5.32-53.96-8.69-80.851zm163.84 6.151c24.43 0.65 48.76 5.18 72.99 6.93 1.82 28.36 3.6 56.88 4.27 85.32-24.06-0.76-48-3.94-72.07-4.94-2.99-28.86-3.16-58.29-5.19-87.31zm82.56 7.66c24.03 2.49 48.11 5.54 72.23 7.56-0.75 27.62 1.85 56.27-0.1 83.47-22.6-3.74-47.01-1.95-68.69-6.14-0.64-27.49-5.57-58.85-3.44-84.89zm81.43 8.73c23.65 2.05 47.34 4.89 70.95 7.6-0.73 26.44 1.43 53.11-1.95 79.4-23.24 0.44-46.54-2.2-69.57-5.12 1.73-26.43-2.08-56.73 0.57-81.88zm78.43 8.62c24.25-0.03 48.19 4.72 72.33 6.58 0.45 25.74-0.37 52.24-1.97 77.52-23.08 1.13-47.57-3.08-71.08-4.93-0.3-26.23 1.04-52.8 0.72-79.17zm81.34 7.3c23.69 2.56 47.42 4.9 71.05 7.93-1.22 25.22-1.87 51.25-5.02 75.9-23.13-3.28-47.35-2.02-69.89-6.33 2.91-25.66 0.19-52.14 3.86-77.5zm78.88 9.03c24.08 1.26 48.45 3.46 72.14 7.96-0.79 23.69-2.88 47.77-5.86 71.11-22.81 0.28-47.28-1.01-70.29-4.8 0.65-24.77 2.46-49.54 4.01-74.27zm81.61 8.66c22.78 0.02 45.38 4.16 67.98 6.62-0.14 23.48-4.27 46.83-6.56 70.19-22.61-0.39-45.5-2.97-68.16-4.77 2.51-23.54 0.67-49.92 6.74-72.04zm-638.04 33.79c16.9 0.47 33.87 1.33 50.6 3.83 9.18 12.78 17.09 26.7 25.44 40.13 1.86 15.54 3.59 32.58 2.99 47.65-21.55 0.85-44.33-2.21-66.24-3.34-5.74-29.16-11.21-58.56-12.79-88.27zm86.41 6.33c19.07-0.13 38.05 2.91 57.13 3.39 4.13 0.05 11.05 1.02 7.85 7.73 0.61 26.17 4.15 52.28 3.21 78.48-8.91 0.37-17.93 0.53-26.72-1.22-14.28-21.73-27.55-44.21-41.56-66.16-5.03-6.28-4.28-14.64-3.73-22.15 1.27-0.04 2.54-0.06 3.82-0.07zm73.66 5.32c23.62-0.18 47.09 3.73 70.71 4.52 3.36 27.71 2.65 56.5 4.91 84.55-23.92-0.62-47.81-2.56-71.74-3.56-0.57-27.91-5.8-59.3-3.88-85.51zm80.01 5.8c23 2.16 46.95 0.72 69.45 5.98-2.22 26.85 2.21 54.32-0.45 80.72-20.96 0.05-43.88-0.64-65.3-3.43-2.03-27.71-2.2-55.58-3.7-83.27zm77.47 6.26c23.06-0.09 46.18 2.89 69.08 4.4 2.47 26.33-0.48 53.66-0.68 80.36-22.72 0.58-45.42-3.41-68.12-2.36-0.91-27.45-0.43-54.94-0.28-82.4zm78.9 4.8c22.94 1.94 46.44 3.14 68.99 6 1.41 25.9-0.95 53.45-3.08 79.1-22.45-2.87-46-2-68.02-4.65-0.14-26.18-0.61-54.89 2.11-80.45zm77.43 6.49c23.29 0.22 46.59 2.56 69.72 5.25-0.76 25.66-1.23 51.86-4.87 77.1-22.39-2.56-45.13-1.14-67.48-4.14 0.62-26.06 1.6-52.15 2.63-78.21zm77.56 6.27c23.48 0.11 46.98 1.95 70.32 4.13-1 24.61-3.42 50.49-6.56 74.95-22.11 1.19-45.38-1.28-67.78-3.38 1.06-25.23 2.42-50.49 4.02-75.7zm78.89 4.95c22.53 1.78 45.25 2.84 67.71 5.35-2.55 24.09-3.82 49.28-8.56 73.32-21.89-1.24-43.8-1.49-65.66-2.79 1.46-25.26 2.54-50.84 6.51-75.88zm-544.59 15.15c7.42 8.88 16.24 21.16 19.91 32.46-24.61 7.99-16.99-18.52-19.91-32.46zm-70.59 34.99c21.44 1.31 42.94 2.45 64.4 3.68 3.11 30.17 5.57 60.63 6.45 90.96-18.21-1.88-38.64 3.94-55.91-1.8-3.69-30.68-12.71-64.04-14.94-92.84zm82.95 4.75c5 0.04 10 0.42 14.93 1.36 15.5 24.78 31.21 49.51 46.52 74.39 1.04 5.32 2.28 10.94 1.2 16.36-18.91 0.65-37.75-1.6-56.66-0.87-3.63 0.01-13.36 0.39-9.69-7.28-1.24-27.92-5.04-55.84-5.29-83.74 2.99-0.15 5.99-0.25 8.99-0.22zm50.57 1.8c5.06 0.03 8.9 1.49 7.52 8.38-0.92 9.27 3.45 20.08 0.27 28.57-7.32-12.34-16.47-23.87-22.66-36.79 3.52 1.2 9.81-0.19 14.87-0.16zm16.88 2.01c23.49 0.32 46.88 2.78 70.31 3.95 2.19 28.93 3.97 57.9 4.35 86.92-15.78-1.52-31.63-0.72-47.45-0.92-23.66-22.61-33-59.4-27.21-89.95zm78.43 4.58c21.65 0.61 43.97 0.54 65.16 3.74 1.72 27.43 0.45 56.14 0.61 84.06-20.21 0.61-41.57-0.79-61.05-2.06-3.24-27.89-2.38-57.34-4.72-85.74zm73.56 4.17c22.84 0.44 46.31 0.48 68.75 4.18-0.09 27.24-1.01 54.44-1.54 81.66-22.23-1.11-44.99 0.59-66.92-2.86-1-27.57-0.34-55.34-0.29-82.98zm76.25 3.75c22.89 0.65 46 1.17 68.71 4.09-0.38 26.48-1 52.98-3.04 79.4-22.17 0.51-44.36-1.51-66.52-1.33 1.09-27.06 0.46-54.84 0.85-82.16zm77.64 3.76c22.3 1.87 44.68 2.34 67 4.07-0.68 25.85-1.6 52.08-4.32 77.71-21.58 0.1-44.44-0.58-66.48-1.91 2.22-26.53 0.11-53.54 3.8-79.87zm76.49 4.83c22.21 0.7 45.45 0.85 67 3.99-2.3 24.77-3.77 49.75-6.98 74.39-21.75 2.02-43.61-1.19-65.4-0.94 1.41-25.73 1.29-52.25 5.38-77.44zm74.71 3.9c21.96 0.78 43.91 1.86 65.8 3.95-1.15 24.41-4.73 48.79-8.1 72.93-21.14-0.07-43.6 0.76-64.34-2.37 1.46-24.9 3.66-49.75 6.64-74.51zm-583.22 68.57c15.93 0.03 31.84 1.17 47.76 1.64 1.23 29.54 4.55 58.95 6.46 88.44 1.54 9.69-12.15 1.69-17.04 4.25-9.7-1.19-31.15 8.21-29.6-9-4.48-28.46-10.65-56.74-14.41-85.27 2.27-0.05 4.55-0.07 6.83-0.06zm57.38 1.33c21.34 2.49 42.9 0.01 64.23 2.52 2.63 29.74 3.35 60.02 5.05 89.96-20.94-0.72-44.27 1.33-64.15-0.07-1.34-30.01-6.84-63.39-5.13-92.41zm111.94 3.01c10.62-0.02 21.45 0.15 31.61 1.6 2.41 24.29 2.17 49.19 3.96 73.72-17.71-23.63-32.06-50.04-48.2-74.9 0.53-0.1 1.58-0.29 2.1-0.38 3.47-0.01 6.99-0.03 10.53-0.04zm-38.79 0.03c1.64 0.02 4.89 0.07 6.51 0.1 17.83 29.66 37.23 58.76 54.47 88.55-16.19 1.63-38.79 1.4-56.47 0.02-1.56-29.16-3.7-59.16-4.51-88.67zm80.48 0.77c19.37 1.26 39.98 0.24 58.75 2.09 1.86 28.25 0.03 57.74 0.87 86.46-18.3-2.55-39.89 0.52-56.91-0.82-1.15-28.71-5.4-60.24-2.71-87.73zm83.88 2.28c16.8 0.06 33.57 1.02 50.37 1.66 1.4 27.84-1.33 55.61-1.12 83.44-21.6-0.58-44.49 1.62-65.44-0.74-1.7-27.47-0.38-56.16-0.62-84.09 5.61-0.22 11.21-0.3 16.81-0.27zm59.44 1.65c21.97 2.15 44.16-0.16 66.11 2.71 0.07 26.7-0.98 53.62-3.22 80.11-20.96 1.1-43.99 1.61-64.75-0.12 0.54-26.52 0.18-57.13 1.86-82.7zm73.97 2.41c22.22 0.41 45.42-0.99 67.19 2.35-2.55 25.77-2.81 51.75-5.41 77.52-18.25 0.23-36.54-0.71-54.71 1.43-4.89 1.29-13.65-0.03-10.05-7.93 1.55-24.45 0.47-48.98 2.98-73.37zm75.22 1.16c21.35 0.23 42.69 1.45 64.05 1.5-1.06 25.58-4.43 51.12-6.46 76.67-20.87 1.41-42.02 0.19-62.99 0.61 1.83-26.07 1.68-53.9 5.4-78.78zm88.4 2.33c16.11 0.1 32.21 1.07 48.32 1.47-1.52 24.46-6.3 48.67-7.9 73.09-20.9 2.75-42.06 1.93-63.06 1.69 0.28-25.44 3.86-50.73 6.52-76 5.38-0.21 10.75-0.28 16.12-0.25zm-616.57 274.7c28.95 0.52 36.52 50.7 3.6 55.61-34.96 9.45-46.84-49.11-11.41-54.61 2.75-0.73 5.36-1.04 7.81-1zm444.7 0.03c27.97 0.45 37.42 47.24 6.24 55.12-36.3 12.65-49.77-48.3-13.74-54.19 2.63-0.68 5.13-0.97 7.5-0.93z"
                                      transform="scale(.8)" />
                            </svg>
                        </button>
                    </div>
                    <nav class="navbar">
                        <ul class="nav-menu d-f align-items-center">
                            <li class="nav-item"><a href="{{route('main')}}" class="item-link">خانه</a></li>
                            <li class="nav-item"><a href="{{route('products')}}" class="item-link">محصولات</a></li>
                            <li class="nav-item dropdown-a">
                                <span class="span-hover">شرکت ها</span>
                                <div style="cursor: pointer" class="dropdown-content-a">
                                    @foreach(\App\Models\Brand::all() as $brand)
                                        <div class="text-center hover-s">
                                        <a class="btn hover-su" href="{{route('brand_view',['brand'=>$brand])}}">{{$brand->title}}</a>
                                        </div>
                                    @endforeach
                                </div>
                            </li>
                            <li class="nav-item"><a href="" class="item-link">بچگانه</a></li>
                            <li class="nav-item"><a href="" class="item-link">درباره ما</a></li>
                        </ul>
                    </nav>
                    <div class="logo-header">
                        <a class="logo-header-a" href="{{route('main')}}">
                            <span class="logo-clr">shop</span> here
                        </a>
                    </div>
                    <div class="respons-burger">

                        <?xml version="1.0" encoding="utf-8"?>
                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100px" height="100px" viewBox="0 0 100 100"><path stroke-width="24" stroke-linecap="round" stroke="#000" d="M15 20L85 20M15 50L85 50M15 80L85 80"/></svg>
                    </div>
                </section>
            </section>
        </section>
    </header>

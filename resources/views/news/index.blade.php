@extends('layouts.app')

@section('content')
    <span class="title">News</span>
    <div class="news-container">
        <div class="news-nav">
            <div class="nav-item-container">
                <ul class="nav" id="myTab" role="tablist">
                    <li class="" role="presentation">
                      <button class="news-nav-item active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">important news</button>
                    </li>
                    <li class="" role="presentation">
                      <button class="news-nav-item" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">normal news</button>
                    </li>
                </ul>
            </div>
            <a href="{{ url('news/create') }}" class="button">ADD</a>
        </div>
        <div class="table-container">
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($important as $item)
                            <tr>
                                <th scope="row" class="middle">{{ $loop->index + 1 }}</th>
                                <td>
                                    <img src="https://res.cloudinary.com/daqpxbuu3/image/upload/v1674389086/{{ $item->photo }}" alt="" style="width: 100px; aspect-ratio: 1/1; object-fit:cover;" class="rounded">
                                </td>
                                <td class="middle w-50">{{ Str::substr($item->title, 0, 150) }}</td>
                                <td class="middle">{{ $item->created_at }}</td>
                                <td class="middle">
                                    <a href="{{ url('news/edit',$item->id) }}" class="action edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="{{ url('news/delete',$item->id) }}" class="action delete"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created at</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($normal as $item)
                            <tr>
                                <th scope="row" class="middle">{{ $loop->index + 1 }}</th>
                                <td>
                                    <img src="https://res.cloudinary.com/daqpxbuu3/image/upload/v1674389086/{{ $item->photo }}" alt="" style="width: 100px; aspect-ratio: 1/1; object-fit:cover;" class="rounded">
                                </td>
                                <td class="middle w-50">{{ Str::substr($item->title, 0, 150) }}</td>
                                <td class="middle">{{ $item->created_at }}</td>
                                <td class="middle">
                                    <a href="{{ url('news/edit',$item->id) }}" class="action edit"><i class="fa-solid fa-pen"></i></a>
                                    <a href="{{ url('news/delete',$item->id) }}" class="action delete"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

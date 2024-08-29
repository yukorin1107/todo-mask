@extends('layouts.app')
<head><link rel="stylesheet" href="{{ asset('css/post.index.css') }}"></head>
@section('content') 

  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-8">
      <div id="mypage-parent">
        <a href="{{ route('mypages.mypage') }}" class="btn btn-primary my-button">
            マイページへ
        </a>
      </div>
        <div class="card text-center">
          <div class="card-header">
            タスク一覧
          </div>
          <div class="card-body">
            {{-- @foreach(['Reading', 'Listening', 'Speaking', 'Writing', 'Vocabulary'] as $type)
              <h3>{{ $type }}</h3>
              <hr>
              @foreach($tasks->where('type', $type) as $task)
                <div class="task-item mb-4">
                  <h5 class="card-title">タイトル : {{ $task->name }}</h5>
                  <p class="card-text">内容 : {{ $task->description }}</p>
                  <a href="{{ route('posts.show', $task->id) }}" class="btn btn-primary">詳細へ</a>

                  @if (App\Models\Bookmark::where('user_id', Auth::id())->where('task_id', $task->id)->exists())
                    <form action="{{ route('unbookmark', $task) }}" method="POST" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-warning">ブックマーク解除</button>
                    </form>
                  @else
                    <form action="{{ route('bookmark', $task) }}" method="POST" style="display:inline;">
                      @csrf
                      <button type="submit" class="btn btn-success">ブックマークする</button>
                    </form>
                  @endif
                  <a href="{{ route('StudyTime.create', ['task_id' => $task->id]) }}" class="btn btn-primary">完</a>
                  @if($task->image)
                    <div class="image mt-3">
                      <img src="{{ Storage::url('images/' . $task->image) }}" alt="" class="thumbnail">
                    </div>
                  @endif
                  <div class="card-footer text-muted">
                    投稿日時 : {{ $task->created_at }}
                  </div>
                </div>
              @endforeach
              <hr>
            @endforeach --}}

            {{-- ここからbootstrapのテンプレ --}}
            <div class="accordion" id="accordionExample">
              @foreach(['Reading', 'Listening', 'Speaking', 'Writing', 'Vocabulary'] as $type)
              <div class="accordion-item">
                  <h2 class="accordion-header" id="heading{{ $loop->index }}" >
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $loop->index }}" aria-expanded="false" aria-controls="collapse{{ $loop->index }}">
                        {{ $type }}: {{ $tasksCountByType[$type] ?? 0 }}件
                      </button>
                  </h2>
                  <div id="collapse{{ $loop->index }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $loop->index }}" data-bs-parent="#accordionExample"> 
                      <div class="accordion-body">
                          @foreach($tasks->where('type', $type) as $task)
                          <div class="task-item mb-4">
                            {{-- <div id="task-name">
                              <a href="{{ route('StudyTime.create', ['task_id' => $task->id]) }}" >
                                <img src="{{ asset('img/Post.index/check.png') }}" alt="" id="checkbox">
                              </a>
                              <h5 class="card-title">  {{ $task->name }}</h5>
                            </div> --}}

                            <div id="task-name">
                              {{-- <a href="{{ route('StudyTime.create', ['task_id' => $task->id]) }}">
                                <img src="{{ asset('img/Post.index/check-blank.png') }}" alt="" id="checkbox">
                              </a> --}}
                              
                              @if (App\Models\Bookmark::where('user_id', Auth::id())->where('task_id', $task->id)->exists())
                                <form action="{{ route('unbookmark', $task) }}" method="POST" style="display:inline;" >
                                    @csrf
                                    @method('DELETE')
                                    {{-- ブックマーク解除 --}}
                                    <button type="submit" class="star-design"><img src="{{ asset('img/Post.index/star.png') }}" alt="" id="star" class="star-img"></button>
                                </form>
                              @else
                                <form action="{{ route('bookmark', $task) }}" method="POST" style="display:inline;">
                                  @csrf
                                  {{-- ブックマークする --}}
                                  <button type="submit" class="star-design"><img src="{{ asset('img/Post.index/star-blank.png') }}" alt="" id="star-blank" class="star-img"></button>
                                </form>
                              @endif
                                


                              <h5 class="card-title">{{ $task->name }}</h5>
                            </div>

                              {{-- <p class="card-text">内容 : {{ $task->description }}</p> --}}
                              <a href="{{ route('posts.show', $task->id) }}" class="btn btn-primary">詳細へ</a>
          
                                <a href="{{ route('StudyTime.create', ['task_id' => $task->id]) }}" class="btn btn-primary">完</a>

                              @if($task->image)
                                <div class="image mt-3">
                                    <img src="{{ Storage::url('images/' . $task->image) }}" alt="" class="thumbnail">
                                </div>
                              @endif
                              {{-- <div class="card-footer text-muted">
                                  投稿日時 : {{ $task->created_at }}
                              </div> --}}
                          </div>
                          @endforeach
                      </div>
                  </div>
              </div>
              @endforeach
            </div>

          </div>
        </div>
      </div>
      {{-- <div class="col-md-12 d-flex justify-content-between align-items-center"> --}}
        <div id="button-parent">
          <div>
            <a href="{{ route('Complete.index') }}" class="btn btn-primary button-complete mb-2 mb-md-0 complete-button">
                完了一覧画面へ
            </a>
          </div>
          <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary button-new mb-2 mb-md-0">
                新規投稿
            </a>
          </div>
        </div>
      {{-- </div>     --}}
    </div>
  </div>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get all accordion buttons
      const accordionButtons = document.querySelectorAll('.accordion-button');
    
      // Restore accordion state from localStorage (if any)
      const activeAccordion = localStorage.getItem('activeAccordion');
      if (activeAccordion) {
        const collapseElement = document.getElementById(activeAccordion);
        if (collapseElement) {
          collapseElement.classList.add('show'); // Open the accordion
          collapseElement.previousElementSibling.querySelector('.accordion-button').classList.remove('collapsed'); // Make sure the button is active
          collapseElement.previousElementSibling.querySelector('.accordion-button').setAttribute('aria-expanded', 'true'); // Set aria-expanded to true
        }
      }
    
      // Add event listeners to all accordion buttons
      accordionButtons.forEach(button => {
        button.addEventListener('click', function() {
          const targetId = this.getAttribute('data-bs-target').substring(1); // Get the ID of the target accordion section
          localStorage.setItem('activeAccordion', targetId); // Store the ID of the target section in localStorage
        });
      });
    
      // Clear localStorage only when navigating away, not on bookmark button clicks
      window.addEventListener('beforeunload', function(event) {
        if (!event.target.activeElement.closest('form')) {
          localStorage.removeItem('activeAccordion');
        }
      });
    });
  </script>
    


@endsection

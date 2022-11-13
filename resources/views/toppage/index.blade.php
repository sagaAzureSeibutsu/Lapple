<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Mypage Index') }}
      </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
            <table class="text-center w-full border-collapse">
                <thead>
                <h3>この人はいかが？</h3>
                <div style="margin-top: 30px;">

                <table class="table table-striped">
                <tr>
                <th>氏名</th>
                <td>{{ $user->name }}</td>
                </tr>
                <tr>
                <th>メールアドレス</th>
                <td>{{ $user->email }}</td>
                </tr>
                </thead>
            </table>

            {{-- 興味の一覧表示 --}}
            <label><b>興味のあること</b></label>
            <div class="flex">
            @if(count($interests) == 0)
            <b>この人趣味ないです。</b>
            @else
            @foreach($interests as $interest)
            <div class="tag">
                <b>井 </b>{{$interest}}
                <button type="submit" class="rounded-full px-1 text-xs font-light tracking-widest text-white bg-red-500 shadow-lg focus:outline-none hover:bg-red-700 hover:shadow-none">
                    X
                </button>
            </div>
            @endforeach
            </div>
            @endif
            </div>

        </div>
        </div>
    </div>

    <div class="result">
        <div class="buttons">
            <div class="leftButton">
                {{-- <form action="{{ route('block', $tweet->user) }}" method="POST" class="text-left"> --}}
                    {{-- @csrf --}}
                    <button type="submit" class="btn btn--maru btn--circle btn--circle-a btn--shadow">
                        OK!
                    </button>
                {{-- </form> --}}
            </div>
            <div class="rightButton">
                <form action="{{ route('dislike.store') }}" method="POST" class="text-left">
                @csrf
                <div class="inline-block">
                    <button type="submit" class="btn btn--batu btn--circle btn--circle-a btn--shadow">
                        NG!
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>

<style>
    .result {
        width: 100%;
    }
    .buttons {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .rightButton {
        margin-inline-start: 20vw;
    }
    .tag {
        display: inline-block;
        margin: .5em .5em 0 0;
        padding: .4em;
        line-height: 1;
        text-decoration: none;
        color: black;
        background-color: #fff;
        border: 1px solid black;
        border-left: 5px solid black;
    }

    button.btn--maru {
    color: #fff;
    background-color: #eb6100;
    }

    button.btn--maru:hover {
    color: #fff;
    background: #f56500;
    }

    button.btn--batu {
    color: #fff;
    background-color: #0061eb;
    }

    button.btn--batu:hover {
    color: #fff;
    background: #0065f5;
    }

    button.btn--shadow {
    -webkit-box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.3);
    }

    button.btn--circle {
    border-radius: 50%;
    line-height: 100px;
    width: 100px;
    height: 100px;
    padding: 0;
    }
</style>

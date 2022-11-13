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
                <h3>プロフィール</h3>
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

            {{-- 興味の新規追加 --}}
            {{-- <div class="py-6">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('common.errors')
                    <form action="{{ route('interest.store') }}" method="POST">
                    @csrf
                    <div>
                    <label class="font-bold text-lg text-grey-darkest" for="interest_title">興味を登録する</label>
                    </div>
                    <div class="inline-block">
                        <input class="w-1/3 border py-2 px-3 text-grey-darkest" type="text" name="interest_title" id="interest_title">
                        <button type="submit" class="w-1/3 px-3 py-2 font-medium tracking-widest text-white bg-black shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                            登録
                        </button>
                    </div>
                    </form>
                </div>
            </div> --}}

            {{-- 興味の一覧表示 --}}
            {{-- <div class="flex">
                @foreach($interests as $interest)
                <form action="{{ route('interest.destroy',$interest->id) }}" method="POST">
                    @method('delete')
                    @csrf
                    <div class="tag">
                        <b>井 </b>{{$interest->interest_title}}
                        <button type="submit" class="rounded-full px-1 text-xs font-light tracking-widest text-white bg-red-500 shadow-lg focus:outline-none hover:bg-red-700 hover:shadow-none">
                            X
                        </button>
                    </div>
                </form>
                @endforeach
            </div> --}}

            </div>
        </div>
        </div>
    </div>
</x-app-layout>

<style>
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
</style>

<!-- resources/views/tweet/index.blade.php -->

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
            <td>{{ Auth::user()->name }}</td>
            </tr>  
            <tr>
            <th>メールアドレス</th>
            <td>{{ Auth::user()->email }}</td>
            </tr>  
            <tr>
            <th>住所（エリア）</th>
            <td>{{ Auth::user()->area }}</td>
            </tr>
            <tr>
            <th>プログラム経験年数</th>
            <td>{{ Auth::user()->experience }}</td>
            </tr>
            </thead>
            <tbody>
              @foreach ($mypages as $mypage)
              <tr class="hover:bg-grey-lighter">
                
                  
                    <!-- 更新ボタン -->
                    <!-- 削除ボタン -->
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>


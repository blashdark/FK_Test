<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if (Session::has('message'))
        <p class="alert alert-info">{{ Session::get('message') }}</p>
    @endif
    <div>
        <h1>Product</h1>
        <form action="{{ route('product.store') }}" method="post">
            @csrf
            <label for="name">Tên sp</label>
            <input type="text" name="name" id="name" placeholder="Nhập tên sp">
            <label for="category_id">Danh mục</label>
            <select name="category_id" id="category">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <button type="submit">Thêm</button>
        </form>
        <table>
            <thead>
                <th width="500px">Name</th>
                <th width="500px">Category</th>
            </thead>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td>
                        <form action="{{ route('product.delete', ["id"=>$product->id])}}" method="post">
                            @csrf
                            <button type="submit">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        <h1>Category</h1>
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <label for="name">Tên danh mục</label>
            <input type="text" name="name" id="name" placeholder="Nhập tên sp">
            <button type="submit">Thêm</button>
        </form>
        <table>
            <thead>
                <th>Name</th>
            </thead>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>
                    <form action="{{ route('category.delete', ["id"=>$category->id])}}" method="post">
                        @csrf
                        <button type="submit">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</body>
</html>
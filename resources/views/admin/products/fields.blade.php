<div class="form-group {{ $errors->has('name')?'has-error':'' }}">
    {{ form::label('product_name','Product Name') }}
    {{ form::text('name',$product->name,['class'=>'form-control border-input','placeholder'=>'Macbook pro']) }}
    <span class="text-danger">{{ $errors->has('name')?$errors->first('name'):'' }}</span>
</div>

<div class="form-group {{ $errors->has('price')?'has-error':'' }}">
    {{ form::label('price','Product Price') }}
    {{ form::text('price',$product->price,['class'=>'form-control border-input','placeholder'=>'$2500']) }}
    <span class="text-danger">{{ $errors->has('price')?$errors->first('price'):'' }}</span>
</div>

 <div class="form-group {{ $errors->has('description')?'has-error':'' }}">
    {{ form::label('description','Product Description') }}
    {{ form::textarea('description',$product->description,['class'=>'form-control border-input','placeholder'=>'Product Description','cols'=>'30','rows'=>'10']) }}
    <span class="text-danger">{{ $errors->has('description')?$errors->first('description'):'' }}</span>
</div>

<div class="form-group {{ $errors->has('image')?'has-error':'' }}">
    {{ form::label('image','Product Image') }}
    {{ form::file('image',['class'=>'form-control border-input','id' => 'image']) }}
    <div id="thumb-output"></div>
    <span class="text-danger">{{ $errors->has('image')?$errors->first('image'):'' }}</span>
</div>

                                       
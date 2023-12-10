<x-app-layout>
 <x-slot name="header">
 	<h2 class="font-semibold text-xl text-gray-800 leading-tight">
 	    {{ __('Product List') }}
 	</h2>
 </x-slot>
 <div class="py-12">
     <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
 	<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
 	    <div class="p-6 text-gray-900">

 	@if(session()->has('success'))
		<div class="bg-green-100 border border-green-400 text-white-700 px-4 py-3 rounded
relative" role="alert">
 		{{ session()->get('success') }}
 	        </div>
 	@endif
 	@if(session()->has('error'))
		<div class="bg-red-100 border border-red-400 text-white-700 px-4 py-3 rounded relative" role="alert">
		{{ session()->get('error') }}
		</div>
 	@endif
	@role('admin')
	<form action="{{ route('products.create' )}}" method="GET">
 		{{ csrf_field() }}
 	<button class="py-2 px-4 mb-6 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75" type="submit">New</button>
	</form>
	@endrole
	<div class="flex justify-center">
 	<table id="list" class="min-w-full mb-6 divide-y divide-gray-200 border-separate border-spacing-2 border border-slate-500">
 		<thead>
		 <tr>
		 <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 tracking-wider border border-slate-500">Id</th>
		 <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 tracking-wider border border-slate-500">Title</th>
		 <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 tracking-wider border border-slate-500">Code</th>
		 <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 tracking-wider border border-slate-500">Description</th>
		 <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 tracking-wider border border-slate-500">Price</th>
		 <th class="px-6 py-3 bg-gray-50 text-center font-medium text-gray-500 tracking-wider border border-slate-500">Image</th>
		 @role('admin')
		 <td colspan="2" class="px-6 py-3 bg-gray-50 text-center">Action</td>
		 @endrole
		 </tr>
		 </thead>
		 <tbody>
		 @foreach($products as $product)
		 <tr>
		 <td class="px-6 py-4 whitespace-nowrap border border-slate-700">{{ $product->id }}</td>
		 <td class="px-6 py-4 whitespace-nowrap border border-slate-700">{{ $product->title }}</td>
		 <td class="px-6 py-4 whitespace-nowrap border border-slate-700">{{ $product->code }}</td>
		 <td class="px-6 py-4 whitespace-nowrap border border-slate-700">{{ $product->description }}</td>
		 <td class="px-6 py-4 whitespace-nowrap border border-slate-700">{{ $product->price }}</td>
		 <td class="px-6 py-4 whitespace-nowrap border border-slate-700"><img style="width:20vh;height:auto;max-height:36vh;" src="{{ url('storage/'.$product->image) }}" alt="Bad"/></td>
		 @role('admin')
		 <td class="px-6 py-4 whitespace-nowrap border border-slate-700"><a class="py-2 px-4 mb-6 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75" href="{{ route('products.edit',$product->id) }}">Edit</a></td>
		 <td class="px-6 py-4 whitespace-nowrap border border-slate-700">
		 <form action="{{ route('products.destroy', $product->id)}}" method="post">
			 {{ csrf_field() }}
			 @method('DELETE')
 			<button class="py-2 px-4 bg-red-500 text-white font-semibold rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75" type="submit">Delete</button>
 		</form>
		@endrole
		</td>
	 	</tr>
		@endforeach
 		</tbody>
 		</table>
		</div>
		<div class="sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
			{{ $products->links()}}
		</div>
 	     </div>
	 </div>
     </div>
 </div>
</x-app-layout>

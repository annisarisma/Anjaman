@extends('layouts.admin')
<link rel="icon" href="{{ url('images/Anjaman_Logo.png') }}">
@section('title')
Anjaman | Transaksi
@endsection

    <!-- Page Wrapper -->
    <div id="wrapper">
    @section('content')
        @php
            foreach ($galleries as $gallery) {
                if ($gallery->product_id == $product->id) {
                    $array[] = $gallery->images;
                }
            }
        @endphp
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="flex-column" style="padding-left: 300px;">

            <!-- Main Content -->
            <div id="content" class="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800 mt-4">Edit Market</h1>
                
                    </div>
                    
                    <div class="card shadow">
                        <div class="card-body">
                            <form action="/admin/updatemanagemarket/{{ $product->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                                <div class="form-group">
                                    <label for="title">Market Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="name" value="{{ $product->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea name="description" id="description" class="d-block w-100 form-control" rows="10">{{ $product->description }}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="travel_packages_id">Category Anyaman</label>
                                    <select name="category" id="category" class="form-control" value="{{ $product->category }}">
                                        <option value="Tas">Tas Anyaman</option>
                                        <option value="Topi">Topi Anyaman</option>
                                        <option value="Pot">Pot Anyaman</option>
                                        <option value="Keranjang">Keranjang Anyaman</option>
                                    </select>
                                </div>

                                <div class="form-group-cover" style="margin-top: 16px;">
                                    <label for="image">Image Thumbnail</label>
                                    <div class="container-images-cover">
                                        <div id="second-input-thumbnail" onclick="mainInputActiveThumbnail()" class="form-group-images-gallery">
                                            <div class="image-placeholder">
                                                <img id="image-thumbnail" src="{{ asset('storage/images/' . $product->image) }}" alt="">
                                            </div>
                                            <div class="file-placeholder">
                                                <div class="content-image-upload">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <p>No file choosen!</p>
                                                </div>
                                                <div class="close-btn">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </div>
                                            <div class="image-choose-btn">
                                                <input id="main-input-thumbnail" type="file" name="image-cover" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-grup-gallery" style="margin-top: 16px;">
                                    <label for="image">Image Gallery</label>
                                    <div class="container-images-gallery">
                                        <div id="second-input1" onclick="mainInputActive1()" class="form-group-images-gallery">
                                            <div class="image-placeholder">
                                                <img id="image1" src="{{ asset('storage/images/' . $array[0]) }}" alt="" style="border: none;">
                                            </div>
                                            <div class="file-placeholder">
                                                <div class="content-image-upload">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <p>No file choosen!</p>
                                                </div>
                                                <div class="close-btn">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </div>
                                            <div class="image-choose-btn">
                                                <input id="main-input1" type="file" name="image1" value="{{ $array[0] }}" hidden>
                                                <input type="text" name="gallery_id0" value="{{ $galleries[0]->id }}" hidden>
                                                <input type="text" name="product_id" value="{{ $galleries[0]->product_id }}" hidden>
                                            </div>
                                        </div>

                                        <div id="second-input2" onclick="mainInputActive2()" class="form-group-images-gallery">
                                            <div class="image-placeholder">
                                                <img id="image2" src="{{ asset('storage/images/' . $array[1]) }}" alt="">
                                            </div>
                                            <div class="file-placeholder">
                                                <div class="content-image-upload">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <p>No file choosen!</p>
                                                </div>
                                                <div class="close-btn">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </div>
                                            <div class="image-choose-btn">
                                                <input id="main-input2" type="file" name="image2" value="{{ $array[1] }}" hidden>
                                                <input type="text" name="gallery_id1" value="{{ $galleries[1]->id }}" hidden>
                                                <input type="text" name="product_id" value="{{ $galleries[1]->product_id }}" hidden>
                                            </div>
                                        </div>

                                        <div id="second-input3" onclick="mainInputActive3()" class="form-group-images-gallery">
                                            <div class="image-placeholder">
                                                <img id="image3" src="{{ asset('storage/images/' . $array[2]) }}" alt="">
                                            </div>
                                            <div class="file-placeholder">
                                                <div class="content-image-upload">
                                                    <i class="fas fa-cloud-upload-alt"></i>
                                                    <p>No file choosen!</p>
                                                </div>
                                                <div class="close-btn">
                                                    <i class="fas fa-times"></i>
                                                </div>
                                            </div>
                                            <div class="image-choose-btn">
                                                <input id="main-input3" type="file" name="image3" value="{{ $array[2] }}" hidden>
                                                <input type="text" name="gallery_id2" value="{{ $galleries[2]->id }}" hidden>
                                                <input type="text" name="product_id" value="{{ $galleries[2]->product_id }}" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" style="margin-top: 16px;">
                                    <label for="title">Stock</label>
                                    <input type="text" class="form-control" name="stock" id="stock" placeholder="stock" value="{{ $product->stock }}">
                                </div>
                                <div class="form-group" style="margin-top: 16px;">
                                    <label for="price">Price</label>
                                    <input type="number" class="form-control" name="price" id="price" placeholder="price" value="{{ $product->price }}">
                                </div>
                                <button type="submit" class="btn btn-success btn-block">
                                    Add
                                </button>
                            </form>
                        </div>    
                    </div>    
                
                </div>
                <!-- /.container-fluid -->

                
            
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>2022 Copyright • All rights reserved • Made by Capstone Project Team A</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <script>
        const mainInputThumbnail = document.querySelector("#main-input-thumbnail");
        const mainInput1 = document.querySelector("#main-input1");
        const mainInput2 = document.querySelector("#main-input2");
        const mainInput3 = document.querySelector("#main-input3");
        const secondInputThumbnail = document.querySelector("#second-input-thumbnail");
        const secondInput1 = document.querySelector("#second-input1");
        const secondInput2 = document.querySelector("#second-input2");
        const secondInput3 = document.querySelector("#second-input3");
        const imgthumbnail = document.querySelector("#image-thumbnail");
        const img1 = document.querySelector("#image1");
        const img2 = document.querySelector("#image2");
        const img3 = document.querySelector("#image3");


        function mainInputActiveThumbnail() {
            mainInputThumbnail.click();
        }
        mainInputThumbnail.addEventListener("change", function() {
            const file = this.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    imgthumbnail.src = result;
                    }
                reader.readAsDataURL(file);
            }
        });

        
        function mainInputActive1() {
            mainInput1.click();
        }
        mainInput1.addEventListener("change", function() {
            const file = this.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    img1.src = result;
                    }
                reader.readAsDataURL(file);
            }
        });


        function mainInputActive2() {
            mainInput2.click();
        }
        mainInput2.addEventListener("change", function() {
            const file = this.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    img2.src = result;
                    }
                reader.readAsDataURL(file);
            }
        });


        function mainInputActive3() {
            mainInput3.click();
        }
        mainInput3.addEventListener("change", function() {
            const file = this.files[0];
            if(file) {
                const reader = new FileReader();
                reader.onload = function() {
                    const result = reader.result;
                    img3.src = result;
                    }
                reader.readAsDataURL(file);
            }
        });

    </script>

</body>
@endsection
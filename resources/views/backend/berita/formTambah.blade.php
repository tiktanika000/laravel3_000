@extends('backend/layout/main')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Form Tambah Berita</h1>

        <div class="card shadow mb-4">
            <div class="card-body">
                <form action="{{route('berita.prosesTambah')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nama Berita</label>
                        <input type="text" name="judul_berita" value="{{old('judul_kategori')}}" class="form-control @error('judul_berita') is-invalid @enderror">
                        @error('judul_berita')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Kategori Berita</label>
                        <select name="id_kategori" class="form-control @error('id_kategori') is-invalid @enderror">
                            @foreach($kategori as $row)
                                <option value="{{$row->id_kategori}}">{{$row->nama_kategori}}</option>
                            @endforeach
                        </select>
                        @error('id_kategori')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Foto Berita</label>
                        <input type="file" name="gambar_berita" class="form-control @error('gambar_berita') is-invalid @enderror" accept="image/*" onchange="tampilkanPreview(this, 'tampilFoto')">
                        @error('gambar_berita')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                        <p></p>
                        <img id="tampilFoto" onerror="this.onerror=null;this.src='https://as1.ftcdn.net/v2/jpg/04/34/72/82/1000_F_434728286_OWQQvAFoXZLdGHlObozsolNeuSxhpr84.jpg';" src="" alt="" width="15%" >
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Isi Berita</label>
                        <textarea id="editor" name="isi_berita" class="form-control @error('isi_berita') is-invalid @enderror">{{old('isi_berita')}}</textarea>
                        @error('isi_berita')
                        <span style="color: red; font-weight: 600; font-size: 9pt">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="{{route('berita.index')}}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
@endsection

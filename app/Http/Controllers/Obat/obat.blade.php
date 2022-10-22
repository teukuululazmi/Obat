@extends('layouts.master')
@section('page_header')
    <!-- Page header -->
			<div class="page-header page-header-light">
				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="{{ route('home') }}" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
							<span class="breadcrumb-item active">List Obat</span>
						</div>
					</div>
				</div>
			</div>
	<!-- /page header -->
@endsection
@section('content')
    <!-- Basic datatable -->
				<div class="card">
					<div class="card-header header-elements-inline">
						<h5 class="card-title">List Obat</h5>
						<div class="header-elements">
                            <div class="list-icons">
                                <button type="button" class="btn bg-dark btn-labeled btn-labeled-left mr-3" data-toggle="modal"
                                    data-target="#modal_theme_primary"><b><i class="icon-add"></i></b>
                                    Tambah</button>
                            </div>
                        </div>
					</div>

					<table class="table datatable-basic">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama Obat</th>
								<th>Tanggal dibuat</th>
								<th>Tanggal Kadaluarsa</th>
								<th>Nama Pembuat</th>
								<th class="text-center">Opsi</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($obat as $item)
							<tr>
                                <td>{{ $loop->iteration }}</td>
								<td>{{ $item->nama_obat }}</td>
								<td>{{ $item->tgl_dibuat }}</td>
								<td>{{ $item->tgl_kadaluarsa }}</td>
								<td><b>{{ $item->nama_pembuat }}</b></td>
								<td class="text-center">
									<div class="list-icons">
										<div class="dropdown">
											<a href="#" class="list-icons-item" data-toggle="dropdown">
												<i class="icon-menu9"></i>
											</a>
											<div class="dropdown-menu dropdown-menu-right">
												<a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal_form_horizontal{{ $item->id }}"><i class="icon-pencil3"></i> Edit</a>
												<a href="{{ route('obatDelete', $item->id) }}" class="dropdown-item delete"><i class="icon-eraser2"></i> Hapus</a>
											</div>
										</div>
									</div>
								</td>
							</tr>
                            <div id="modal_form_horizontal{{ $item->id }}" class="modal fade" tabindex="-1">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Obat</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="success" data-success="{{Session::get('success')}}"></div>
                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form action="{{ route('obatUpdate', $item->id) }}" method="POST" class="form-horizontal">
                                            @method('patch')
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-3">Nama Obat</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="nama_obat" value="{{ $item->nama_obat ?? '' }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-3">Tanggal dibuat</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="tgl_dibuat" value="{{ $item->tgl_dibuat ?? '' }}" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label class="col-form-label col-sm-3">Tanggal Kadaluarsa</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="tgl_kadaluarsa" value="{{ $item->tgl_kadaluarsa ?? '' }}" class="form-control">
                                                    </div>
                                                </div>
                                                
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Submit form</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
						</tbody>
					</table>
				</div>
				<!-- /basic datatable -->
                <div id="modal_theme_primary" class="modal fade" tabindex="-1">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header bg-primary">
								<h6 class="modal-title">Table Obat</h6>
								<button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
                            <div class="success" data-success="{{Session::get('success')}}"></div>
                            <form action="{{ route('obatPost') }}" method="POST" class="form-horizontal">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Nama Obat</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_obat" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Tanggal Dibuat</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl_dibuat" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Tanggal Kadaluarsa</label>
                                        <div class="col-sm-9">
                                            <input type="date" name="tgl_kadaluarsa" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-3">Nama Pembuat</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="nama_pembuat" class="form-control" value="{{ auth()->user()->name }}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-link" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn bg-primary">Save changes</button>
                                </div>
                            </form>
						</div>
					</div>
				</div>
@endsection
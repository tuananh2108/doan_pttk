@extends('backend.master.master')
@section('content')
    <h2 class="main-title">Dashboard</h2>
    <div class="row stat-cards">
        <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
            <div class="stat-cards-icon primary">
            <i data-feather="folder" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
            <p class="stat-cards-info__num">{{$qty_category}}</p>
            <p class="stat-cards-info__title">Tổng số loại đồ ăn</p>
            </div>
        </article>
        </div>
        <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
            <div class="stat-cards-icon warning">
            <i data-feather="file" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
            <p class="stat-cards-info__num">{{$qty_food}}</p>
            <p class="stat-cards-info__title">Tổng số món ăn</p>
            </div>
        </article>
        </div>
        <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
            <div class="stat-cards-icon purple">
            <i data-feather="file" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
            <p class="stat-cards-info__num">{{$qty_order}}</p>
            <p class="stat-cards-info__title">Tổng số đơn đặt hàng</p>
            </div>
        </article>
        </div>
        <div class="col-md-6 col-xl-3">
        <article class="stat-cards-item">
            <div class="stat-cards-icon success">
                <i data-feather="feather" aria-hidden="true"></i>
            </div>
            <div class="stat-cards-info">
                <p class="stat-cards-info__num">{{number_format($total_revenue)}} VND</p>
                <p class="stat-cards-info__title">Tổng số doanh thu đạt được</p>
            </div>
        </article>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
        <div class="chart">
            <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
        </div>
        </div>
    </div>
@stop
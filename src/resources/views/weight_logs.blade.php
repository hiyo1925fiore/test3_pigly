@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/weight_logs.css') }}">
@endsection

@section('content')
<div class="weight-logs__top-content">
    <div class="top-content__item">
        <p class="top-content__item--text">目標体重</p>
        <p class="top-content__item--weight"><span class="top-content__item--weight-number">{{ $weight_target->target_weight }}</span>kg</p>
    </div>
    <hr class="top-content__border">
    <div class="top-content__item">
        <p class="top-content__item--text">目標まで</p>
        <p class="top-content__item--weight">
            <span class="top-content__item--weight-number">
                1.5
            </span>
            kg</p>
    </div>
    <hr class="top-content__border">
    <div class="top-content__item">
        <p class="top-content__item--text">最新体重</p>
        <p class="top-content__item--weight"><span class="top-content__item--weight-number">{{$weight_logs[0]->weight}}</span>kg</p>
    </div>
</div>
<div class="weight-logs__logs">
    <div class="weight-logs__logs-container">
        <div class="logs__tool">
            <div class="logs__tool--search">
                <input type="date" name="start-date">
                ～
                <input type="date" name="end-date">
                <button type="submit">検索</button>
            </div>
            <a href="/weight_logs/add">データ追加</a>
        </div>
        <table class="logs__table">
            <tr class="logs__row">
                <th class="logs__label">日付</th>
                <th class="logs__label">体重</th>
                <th class="logs__label">食事摂取カロリー</th>
                <th class="logs__label">運動時間</th>
                <th class="logs__label"></th>
            </tr>
            @foreach($weight_logs as $weight_log)
            <tr class="logs__row">
                <td class="logs__data">{{$weight_log['date']->format('Y/m/d')}}</td>
                <td class="logs__data">{{$weight_log['weight']}}kg</td>
                <td class="logs__data">{{$weight_log['calories']}}cal</td>
                <td class="logs__data">{{ substr($weight_log['exercise_time'], 0, 5) }}</td>
                <td class="logs__data"><a href="weight_logs/{{$weight_log['id']}}/update"><img src="images/update-icon.png" alt=""></a></td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endsection
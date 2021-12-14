<div>
    <div class="row justify-content-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            @if ($status == 'instruction')
                <div class="card">
                    <div class="card-header">Instruction</div>
                    <div class="card-body">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam natus ut delectus ab molestiae officia aperiam cum sapiente perspiciatis saepe!</p>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius quis inventore ut ad! Repellendus accusantium eligendi quam? Voluptates aliquam, voluptate voluptatibus voluptatem delectus quia labore suscipit ex necessitatibus nihil temporibus.</p>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="https://trakteer.id/ferry-dermawan-r8umr/tip">Donasi</a>
                        <button wire:click="changeStatus('start')" class="btn btn-danger">Start</button>
                    </div>
                </div>
            @elseif ($status == 'start')
                <div class="card">
                    <div class="card-header">Soal {{$priority}}/{{$total_questions}}</div>
                    <div class="card-body">
                        <p>{{$correct}}</p>
                        <p>{{$question->body}}</p>
                        <ul class="list-group list-group-flush">
                            @foreach (json_decode($question->answers) as $index => $answer)
                                <li class="list-group-item" wire:click="choiceOption({{$index}})" role="button">
                                    @if ($mySelected === $index)
                                    <i class="bi bi-check-circle-fill text-primary me-3"></i>
                                    @else
                                    <i class="bi bi-circle me-3"></i>
                                    @endif
                                    <span>{{$answer}}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="https://trakteer.id/ferry-dermawan-r8umr/tip">Donasi</a>
                        <div>
                            @if ($mySelected !== NULL)
                                <div>
                                    <span class="btn btn-primary" wire:click="nextQuestion" role="button">Next</span>
                                </div>
                            @else
                                <span class="btn btn-secondary">Next</span>
                            @endif
                        </div>
                    </div>
                </div>
            @elseif ($status == 'finish')
                <div class="card">
                    <div class="card-header">Finish</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between">
                                <div>Total Correct</div>
                                <div>{{$correct}}</div>
                            </li>
                            <li class="list-group-item d-flex justify-content-between">
                                <div>Score</div>
                                <div>{{round(($correct * 100) / $total_questions)}}</div>
                            </li>
                        </ul>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <a href="https://trakteer.id/ferry-dermawan-r8umr/tip">Donasi</a>
                        <a href="{{route('questions.index')}}" class="btn btn-warning">Retry</a>
                    </div>
                </div>
            @else
            <div>
                <div class="text-center">Error</div>
            </div>
            @endif
        </div>
    </div>
</div>

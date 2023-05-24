@extends('layouts/dashboard')

@section('content')

<div id="dashboard-container">

    <div id="skills-container" class="container animate__animated">
        <p id="html-skill" class="skill">HTML - CSS</p>
        <p id="javascript-skill" class="skill">Javascript</p>
        <p id="vue-skill" class="skill">Vue</p>
        <p id="php-skill" class="skill">Php</p>
        <p id="mysql-skill" class="skill">MySQL</p>
        <p id="laravel-skill" class="skill">Laravel</p>
    </div>

    <div id="dashboard-menu" class="container">
        <div id="username">
            <h3>{{$user[0]->name}}</h3>
            <h5>Full Stack Developer</h5>
        </div>
        
        <button class="dashboard-button learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="button-text">
                <a id="projects-link" href="{{route('admin.projects.index')}}">Progetti</a>
            </span>
        </button>
    
        <button id="knowing-button" class="dashboard-button learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="button-text">
                <a id="projects-link" href="#">Conoscenze</a>
            </span>
        </button>
    
        <button id="contact-button" class="dashboard-button learn-more">
            <span class="circle" aria-hidden="true">
                <span class="icon arrow"></span>
            </span>
            <span class="button-text">
                <a id="projects-link" href="#">Contatti</a>
            </span>
        </button>
    </div>

    <div id="dashboard-contacts">
        <p id="contact" class="animate__animated">email@it</p>
    </div>
    
</div>



{{-- autobiography section --}}

<div id="dashboard-main-container" class="full-container">
    <div id="autobiography-container" class="container">
        <div id="autobiography-descript">
            <h2>Chi sono</h2>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut assumenda impedit iste quidem placeat tenetur illo ea corrupti. Quas expedita amet architecto quibusdam accusantium unde modi voluptates distinctio possimus placeat?</p>
        </div>

        <div id="autobiography-photo">
            <img src="https://picsum.photos/200" alt="autobiography-photo">
        </div>
    </div>
</div>


<script>
    let skillsContainer = document.getElementById('skills-container');
    let skills = document.querySelectorAll(".skill");
    let knowingButton = document.getElementById('knowing-button');

    let contact = document.getElementById('contact');
    let contactButton = document.getElementById('contact-button');


    function skillsAppear(){
        skills.forEach(skill => {
            skillsContainer.classList.add('animate__slideInLeft');
            skill.style.display = 'block';
        });
    }

    function contactAppear(){
        contact.classList.add('animate__slideInRight');
        contact.style.display = 'block';
    }

    knowingButton.addEventListener('click', skillsAppear);
    contactButton.addEventListener('click', contactAppear);


</script>
@endsection


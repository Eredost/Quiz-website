.list__categories {
text-align: center;
}

.list__categorie {
display: inline-block;
font-size: 1.1em;
color: #00695c;
}

.list__categorie + .list__categorie {
margin-left: 1em;
}

.paragraph__description {
text-align: right;
line-height: 1.5;
font-size: 1.1em;
margin-top: 1em;
}

.paragraph__author {
text-align: right;
font-size: 0.8em;
color: gray;
}

#quiz {
margin-top: 2em;
}

.quiz__card {
max-width: 600px;
margin: 0 auto;
padding: 1em;
border: 1px solid gray;
box-shadow: 0 0 10px gray;
}

.quiz__card + .quiz__card {
margin-top: 2em;
}

.card__header {
display: flex;
justify-content: space-between;
align-items: center;
margin-bottom: 0.5em;
padding-bottom: 0.5em;
border-bottom: 1px solid gray;
}

.card__header--title {
font-weight: bold;
font-size: 1.1em;
line-height: 1.3;
}

.card__difficulty {
padding: 0.4em 0.8em;
margin: 0 0.7em;
border-radius: 15px;
background-color: #999;
color: #FFF;
font-weight: 700;
}

.difficulty--1 {
background-color: #00C851;
}

.difficulty--2 {
background-color: #FF8800;
}

.difficulty--3 {
background-color: #ff4444;
}

.card__body {
display: flex;
flex-wrap: wrap;
}

.card__body--question {
text-align: center;
padding: 0.7em 0;
width: 50%;
height: 50%;
}

.quiz__score--large {
text-align: center;
font-size: 1.8em;
margin: 1.5em 0;
}

.answer--wrong {
color: #ff4444;
font-weight: bold;
}

.answer--correct {
color: #00C851;
font-weight: bold;
}

.radio {
position: relative;
cursor: pointer;
line-height: 20px;
font-size: 14px;
margin: 15px;
}
.radio .label {
position: relative;
display: block;
float: left;
margin-right: 10px;
width: 20px;
height: 20px;
border: 2px solid #c8ccd4;
border-radius: 100%;
-webkit-tap-highlight-color: transparent;
}
.radio .label:after {
content: '';
position: absolute;
top: 3px;
left: 3px;
width: 10px;
height: 10px;
border-radius: 100%;
background: #225cff;
-webkit-transform: scale(0);
-ms-transform: scale(0);
transform: scale(0);
-webkit-transition: all 0.2s ease;
-o-transition: all 0.2s ease;
transition: all 0.2s ease;
opacity: 0.08;
pointer-events: none;
}
.radio:hover .label:after {
-webkit-transform: scale(3.6);
-ms-transform: scale(3.6);
transform: scale(3.6);
}
input[type="radio"]:checked + .label {
border-color: #225cff;
}
input[type="radio"]:checked + .label:after {
-webkit-transform: scale(1);
-ms-transform: scale(1);
transform: scale(1);
-webkit-transition: all 0.2s cubic-bezier(0.35, 0.9, 0.4, 0.9);
-o-transition: all 0.2s cubic-bezier(0.35, 0.9, 0.4, 0.9);
transition: all 0.2s cubic-bezier(0.35, 0.9, 0.4, 0.9);
opacity: 1;
}
.hidden {
display: none;
}

.quiz__button {
display: block;
background-color: #00C851;
color: #FFF;
font-weight: 700;
border: 2px solid transparent;
border-radius: 5px;
padding: 0.6em 0.7em;
margin: 2em auto 0;
font-size: 1.05em;
-webkit-transition: .3s background-color, color, border;
-o-transition: .3s background-color, color, border;
transition: .3s background-color, color, border;
cursor: pointer;
}

.quiz__button:hover {
background-color: #FFF;
color: #00C851;
border: 2px solid #00C851;
}

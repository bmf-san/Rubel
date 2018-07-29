@extends('bmftech::layouts.master')

@section('title', 'Profile')
@section('canonical', url()->current())

@section('additional-stylesheet')
<link rel="stylesheet" href="{{ asset('/vendor/bmftech//dist/css/profile.min.css') }}">
@endsection

@section('content')
<div>
  @include('bmftech::partials.nav')
  <section class="hero is-primary is-medium header-image">
    <div class="hero-body">
      <div class="container has-text-centered">
        <h1 class="title is-2">
            Profile
          </h1>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-8 is-offset-2">
          <div id="post-content" class="content">
            <h1 id="bmf-san">bmf-san</h1>
            <p>I'm a web developer in Japan.</p>
            <p>If you have any requests, please feel free to submit a issue.</p>
            <p>Please feel free to contact me if there's anything you'd like to ask me.</p>
            <table>
              <thead>
                <tr>
                  <th>Key</th>
                  <th>Value</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Email</td>
                  <td><a href="mailto:bmf.infomation@gmail.com">bmf.infomation@gmail.com</a></td>
                </tr>
                <tr>
                  <td>Twitter</td>
                  <td><a href="https://twitter.com/bmf_san">Twitter - bmf_san</a></td>
                </tr>
                <tr>
                  <td>Blog</td>
                  <td><a href="https://twitter.com/bmf_san">bmf-tech.com</a></td>
                </tr>
                <tr>
                  <td>Qiita</td>
                  <td><a href="http://qiita.com/bmf_san">Qiita - bmf_san</a></td>
                </tr>
                <tr>
                  <td>Github</td>
                  <td><a href="https://github.com/bmf-san">Github - bmf-san</a></td>
                </tr>
                <tr>
                  <td>npm</td>
                  <td><a href="https://www.npmjs.com/~bmf-san">npm - bmf-san</a></td>
                </tr>
                <tr>
                  <td>Speakerdeck</td>
                  <td><a href="https://speakerdeck.com/bmf_san">Speakerdeck - bmf_san</a></td>
                </tr>
                <tr>
                  <td>LaraCafe</td>
                  <td><a href="https://laracafe.connpass.com/">Connpass - LaraCafe</a></td>
                </tr>
                <tr>
                  <td>Job Draft</td>
                  <td><a href="https://job-draft.jp/users/3252">Job Draft - bmf_san</a></td>
                </tr>
              </tbody>
            </table>
            <h1 id="Technical Skills">Technical Skills</h1>
            <table>
              <thead>
                <tr>
                  <th>Key</th>
                  <th>Value</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Language</td>
                  <td>PHP, Go, JavaScript, ShellScript</td>
                </tr>
                <tr>
                  <td>Flamework &amp; Library</td>
                  <td>Laravel, React, Vue.js, jQuery, Redux</td>
                </tr>
                <tr>
                  <td>Architecture</td>
                  <td>MVC, Flux</td>
                </tr>
                <tr>
                  <td>Database</td>
                  <td>MySQL, SQLite</td>
                </tr>
                <tr>
                  <td>Middleware</td>
                  <td>Apache, Nginx </td>
                </tr>
                <tr>
                  <td>OS</td>
                  <td>MacOS, CentOS, Linux</td>
                </tr>
                <tr>
                  <td>Infrastructure</td>
                  <td>VPS, AWS, Vagrant, Docker</td>
                </tr>
                <tr>
                  <td>Tool</td>
                  <td>Atom, Vim, Tmux, Ansible, Git, Github, Redmine</td>
                </tr>
              </tbody>
            </table>
            <h1 id="Work Experience">Work Experience</h1>
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Project</th>
                  <th>Role</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>May, 2016 ~ March, 2017</td>
                  <td>Web Service</td>
                  <td>Frontend, Backend, Infrastructure</td>
                </tr>
                <tr>
                  <td>April, 2017 ~ December, 2017</td>
                  <td>Package</td>
                  <td>Frontend, Backend</td>
                </tr>
                <tr>
                  <td>January, 2018 ~ April, 2018</td>
                  <td>Web Service</td>
                  <td>Requirement definition, System design, Frontend, Backend</td>
                </tr>
              </tbody>
            </table>
            <h1 id="OSS Experience">OSS Experience</h1>
            <table>
              <thead>
                <tr>
                  <th>Project</th>
                  <th>Name</th>
                  <th>Link</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Application</td>
                  <td>Rubel</td>
                  <td><a href="https://github.com/bmf-san/Rubel">Github - Rubel</a></td>
                </tr>
                <tr>
                  <td>Library</td>
                  <td>rubel-router</td>
                  <td><a href="https://github.com/bmf-san/rubel-router">Github - rubel-router</a></td>
                </tr>
              </tbody>
            </table>
            <h1 id="Presentation Experience">Presentation Experience</h1>
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Event</th>
                  <th>Slide</th>
                  <th>Link</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>October 8, 2017</td>
                  <td>Japan PHP Conference 2017</td>
                  <td><a href="https://speakerdeck.com/bmf_san/3nian-mu-enziniaosswohazimeru">3年目エンジニアOSSをはじめる</a></td>
                  <td><a href="http://phpcon.php.gr.jp/2017/#session">phpcon 2017</a></td>
                </tr>
              </tbody>
            </table>
            <h1 id="Hosted Event Experience">Hosted Event Experience</h1>
            <table>
              <thead>
                <tr>
                  <th>Date</th>
                  <th>Event</th>
                  <th>Organization</th>
                  <th>Link</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>January 22, 2017</td>
                  <td>Laravelもくもく会
                    @代官山</td>
                      <td>LaraCafe</td>
                      <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                </tr>
                <tr>
                  <td>February 11, 2017</td>
                  <td>Laravelもくもく会
                    @六本木</td>
                      <td>LaraCafe</td>
                      <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                </tr>
                <tr>
                  <td>March 12, 2017</td>
                  <td>Laravelもくもく会
                    @渋谷</td>
                      <td>LaraCafe</td>
                      <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                </tr>
                <tr>
                  <td>May 20, 2017</td>
                  <td>Laravelもくもく会
                    @新宿</td>
                      <td>LaraCafe</td>
                      <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                </tr>
                <tr>
                  <td>July 8, 2017</td>
                  <td>7/8(sat) Laravelもくもく会
                    @福岡　〜表参道もあるよ〜</td>
                  <td>LaraCafe</td>
                  <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                </tr>
                <tr>
                  <td>July 8, 2017</td>
                  <td>7/8(sat) Laravelもくもく会
                    @表参道　〜福岡もあるよ〜</td>
                  <td>LaraCafe</td>
                  <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                </tr>
                <tr>
                  <td>February 3, 2018</td>
                  <td>Laravelもくもく会
                    @渋谷</td>
                      <td>LaraCafe</td>
                      <td><a href="https://laracafe.connpass.com/event/77659/">Conpass - LaraCafe</a></td>
                </tr>
                <tr>
                  <td>May 25, 2018</td>
                  <td>Laravelもくもく会
                    @表参道</td>
                      <td>LaraCafe</td>
                      <td><a href="https://laracafe.connpass.com/event/86459/">Conpass - LaraCafe</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

@include('bmftech::partials.footer')
@endsection

@extends(get_the_view_path('layouts.master'))

@section('title', 'Profile')
@section('canonical', url()->current())

@section('additional-stylesheet')
<link rel="stylesheet" href="{{ asset('/vendor/bmftech/dist/css/profile.min.css') }}">
@endsection

@section('content')
<div>
    @include(get_the_view_path('partials.nav'))
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
                                    <td>Laravel, FuelPHP, React, Vue.js, jQuery, Redux</td>
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
                                    <td>sakura vps, AWS, heroku, Vagrant, Docker</td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td>Atom, Vim</td>
                                </tr>
                                <tr>
                                    <td>Terminal</td>
                                    <td>iTerm2, Tmux</td>
                                </tr>
                                <tr>
                                    <td>VCS</td>
                                    <td>Git</td>
                                </tr>
                                <tr>
                                    <td>CM</td>
                                    <td>Ansible</td>
                                </tr>
                                <tr>
                                    <td>Tool</td>
                                    <td>Github, Zenhub, Redmine, Backlog</td>
                                </tr>
                            </tbody>
                        </table>
                        <h1 id="Work Experience">Work Experience</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Company Name</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>May, 2017 ~ October, 2018</td>
                                    <td>Innovator Japan Inc.</td>
                                    <td>Web Application Engineer</td>
                                </tr>
                                <tr>
                                    <td>December, 2018 ~</td>
                                    <td>Makuake Inc.</td>
                                    <td>Web Application Engineer</td>
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
                                <tr>
                                    <td>Library</td>
                                    <td>ahi-router</td>
                                    <td><a href="https://github.com/bmf-san/ahi-router">Github - ahi-router</a></td>
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
                                <tr>
                                    <td>December 15, 2018</td>
                                    <td>Japan PHP Conference 2018</td>
                                    <td><a href="https://speakerdeck.com/bmf_san/20dai-gakao-eruenziniakiyarialun">20代が考えるエンジニアキャリア論</a></td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>December 19, 2018</td>
                                    <td>Makuake LT Party</td>
                                    <td><a href="https://speakerdeck.com/bmf_san/urlruteinguwotukuruepisodo1">URLルーティングをつくるエピソード１</a></td>
                                    <td><a href="http://phpcon.php.gr.jp/2018/">phpcon 2018</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <h1 id="Contest Experience">Contest Experience</h1>
                        <table>
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Event</th>
                                    <th>Result</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>September 16, 2018</td>
                                    <td>予選落ち</td>
                                    <td>ISUCON8</td>
                                    <td><a href="http://isucon.net/archives/52388756.html">ISUCON8まとめ</a> </td>
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
                                    <td>Laravelもくもく会@代官山</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>February 11, 2017</td>
                                    <td>Laravelもくもく会@六本木</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>March 12, 2017</td>
                                    <td>Laravelもくもく会@渋谷</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>May 20, 2017</td>
                                    <td>Laravelもくもく会@新宿</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>July 8, 2017</td>
                                    <td>7/8(sat) Laravelもくもく会@福岡　〜表参道もあるよ〜</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>July 8, 2017</td>
                                    <td>7/8(sat) Laravelもくもく会@表参道　〜福岡もあるよ〜</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>February 3, 2018</td>
                                    <td>Laravelもくもく会@渋谷</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/event/77659/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>May 25, 2018</td>
                                    <td>Laravelもくもく会@表参道</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/event/86459/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>June 23, 2018</td>
                                    <td>Laravelもくもく会@外苑前</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/event/89861/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>August 10, 2018</td>
                                    <td>Laravelもくもく会@オンライン</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/event/95720/">Conpass - LaraCafe</a></td>
                                </tr>
                                <tr>
                                    <td>October 22, 2018</td>
                                    <td>Laravelもくもく会@渋谷</td>
                                    <td>LaraCafe</td>
                                    <td><a href="https://laracafe.connpass.com/event/103998/">Conpass - LaraCafe</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@include(get_the_view_path('partials.footer'))
@endsection

<?php


use App\Service\Github;

final class GithubServiceTest extends \App\Tests\MchefTestCase
{
    public function testGithubToDownloadZipUrl() {
        $urlhttp = 'https://github.com/moodle/moodle.git';
        $urlssh = 'git@github.com:moodle/moodle.git';
        $branch = 'master';
        $expected = 'https://github.com/moodle/moodle/archive/master.zip';
        $actual = Github::instance()->githubToDownloadZipUrl($urlhttp, $branch);
        $this->assertEquals($expected, $actual);
        $actual = Github::instance()->githubToDownloadZipUrl($urlssh, $branch);
        $this->assertEquals($expected, $actual);
    }

    public function testGithubToDownloadZipUrlWithTagOrSha() {
        $url = 'https://github.com/iarenaza/moodle-filter_multilang2.git';
        $this->assertEquals(
            'https://github.com/iarenaza/moodle-filter_multilang2/archive/2.0.5.5.zip',
            Github::instance()->githubToDownloadZipUrl($url, '2.0.5.5')
        );
        $this->assertEquals(
            'https://github.com/iarenaza/moodle-filter_multilang2/archive/12122660b067b24f69dfc8964f0fcd52c4f580fa.zip',
            Github::instance()->githubToDownloadZipUrl($url, '12122660b067b24f69dfc8964f0fcd52c4f580fa')
        );
    }
}
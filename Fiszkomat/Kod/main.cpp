//Wojciech Gunia © 2023 - Projekt C++ SFML "Fiszkomat"
//inicjalizacja bibliotek
#include<iostream> 
#include<SFML/Graphics.hpp>
#include<windows.h>
#include<fstream>
#include<string>
#include<clocale>


std::string l1, l2, hm;
//funkcja sprawdz¹ca najechanie myszk¹ na sprite'a
bool isSpriteHover(sf::FloatRect sprite, sf::Vector2f mp)
{
    if (sprite.contains(mp)) {
        return  true;
    }
    return  false;
}

//funkcja split rozdzielaj¹ca 1 liniê z ustawieniami
std::string split1(std::string tekst)
{
    int n = 0, t = 0;;
    std::string j1, j2, ile;
    while (tekst[n] != ':')
    {
        while (tekst[n] != ';' && tekst[n] != ':')
        {
            if (t == 0)
                j1 = j1 + tekst[n];
            else if (t == 1)
                j2 = j2 + tekst[n];
            else if (t == 2)
                ile = ile + tekst[n];
            n++;
        }
        t = t + 1;
        if (tekst[n] == ';')
            n++;
    }
    return j1, j2, ile;
}

//funkcja split rozdzielaj¹ca s³owa
std::string* split2(std::string tekst)
{

    int n = 0, t = 0;
    std::string j1 = "", j2 = "";
    std::string* tab = new std::string[2];
    while (tekst[n] != ':')
    {
        while (tekst[n] != ';' && tekst[n] != ':')
        {
            if (t == 0)
            {
                j1 = j1 + tekst[n];
            }
            else if (t == 1)
            {
                j2 = j2 + tekst[n];
            }
            n++;
        }
        t = t + 1;
        if (tekst[n] == ';')
            n++;
    }
    tab[0] = j1;
    tab[1] = j2;
    return tab;
}

//funkcja ³aduj¹ca tablicê s³ów
std::string** plik(std::string plik)
{
    std::ifstream plik_in;
    plik_in.open(plik , std::ios::in);
    std::string str;
    plik_in >> str;
    l1, l2, hm = split1(str);
    int ile2 = stoi(hm);
    std::string** tab = new std::string * [ile2];
    for (int i = 0; i < ile2; ++i)
    {
        tab[i] = new std::string[2];
    }
    int l = 0;
    while (l < ile2)
    {
        std::string str, lg1, lg2;
        plik_in >> str;
        std::cout << str;
        tab[l] = split2(str);
        l++;
    }
    plik_in.close();
    return tab;
}
//funkcja g³ówna
int main()
{
    //zmienne sfml
    sf::Texture texture, texture2, texture3, texture4;
    sf::Text text, text2;
    sf::Font font;
    sf::Sprite sprite2, sprite3, sprite4;

    //inicjalizacja okna
    sf::RenderWindow window(sf::VideoMode(1240, 720), "Fiszkomat");

    //inicjalizacja zmiennych
    std::string** tab;
    int slowo = 0, umiesz = 0, type = 0;
    tab = plik("file\\slowa.txt");
    font.loadFromFile("arial.ttf");
    text.setFont(font);
    text2.setFont(font);
    std::basic_string < sf::Uint32 > utf32line;
    std::string line = tab[slowo][0];
    sf::Utf8::toUtf32(line.begin(), line.end(), back_inserter(utf32line));
    text.setString(utf32line);
    text2.setString("Click to rotate");
    text.setCharacterSize(24);
    text2.setCharacterSize(24);
    text.setFillColor(sf::Color::Black);
    text.setStyle(sf::Text::Bold);
    text2.setFillColor(sf::Color::Black);
    text2.setStyle(sf::Text::Bold);
    texture.loadFromFile("png\\background.png");
    texture2.loadFromFile("png\\card.png");
    texture3.loadFromFile("png\\tak.png");
    texture4.loadFromFile("png\\nie.png");
    
    sf::Vector2f mp;
    mp.x = sf::Mouse::getPosition(window).x;
    mp.y = sf::Mouse::getPosition(window).y;
    
    bool disp_back = true, disp_card = true, disp = true, disp_wyn = false;
    int pozycja = 0;
    std::string stan = "lang1";
    int ile2 = stoi(hm);
    //pêtla g³ówna programu
    while (window.isOpen())
    {
        //skrypt zakoñczenia programu
        sf::Event event;
        while (window.pollEvent(event))
        {
            if (event.type == sf::Event::Closed)
                window.close();
        }

        //reset t³a programu
        if (disp_back)
        {
            window.clear();
            sf::Sprite sprite;
            sprite.setTexture(texture);
            window.draw(sprite);
            disp_back = false;
        }

        //reset zawartoœci 
        if (disp_card)
        {
            
            sprite2.setTexture(texture2);
            sprite3.setTexture(texture3);
            sprite4.setTexture(texture4);
            sprite2.setPosition(sf::Vector2f(477.f, 142.f));
            sprite3.setPosition(sf::Vector2f(830.f, 162.f));
            sprite4.setPosition(sf::Vector2f(190.f, 162.f));
            sprite2.setScale(sf::Vector2f(1.5, 1.5));
            sprite3.setScale(sf::Vector2f(0.7, 0.7));
            sprite4.setScale(sf::Vector2f(0.7, 0.7));
            window.draw(sprite2);
            window.draw(sprite3);
            window.draw(sprite4);
            sf::FloatRect textRect = text.getLocalBounds();
            sf::FloatRect textRect2 = text2.getLocalBounds();
            text.setOrigin(textRect.width / 2, textRect.height / 2);
            text.setPosition(sf::Vector2f(1240 / 2.0f, 700 / 2.0f));
            window.draw(text);
            text2.setOrigin(textRect2.width / 2, textRect2.height / 2);
            text2.setPosition(sf::Vector2f((1240 / 2.0f), (700 / 2.0f)+180));
            window.draw(text2);
            disp_card = false;
        }

        if (disp_wyn)
        {
            window.clear();
            sf::Sprite sprite;
            sprite.setTexture(texture);
            window.draw(sprite);
            disp_back = false;
            std::string str = "Umiesz: "+ std::to_string(umiesz)+"\nNie umiesz: "+ std::to_string(ile2-umiesz);
            text2.setString("Click to reset");
            sprite2.setTexture(texture2);
            sprite2.setPosition(sf::Vector2f(477.f, 142.f));
            sprite2.setScale(sf::Vector2f(1.5, 1.5));
            window.draw(sprite2);
            text.setString(str);
            sf::FloatRect textRect = text.getLocalBounds();
            sf::FloatRect textRect2 = text2.getLocalBounds();
            text.setOrigin(textRect.width / 2, textRect.height / 2);
            text.setPosition(sf::Vector2f(1240 / 2.0f, 700 / 2.0f));
            window.draw(text);
            text2.setOrigin(textRect2.width / 2, textRect2.height / 2);
            text2.setPosition(sf::Vector2f((1240 / 2.0f), (700 / 2.0f) + 180));
            window.draw(text2);
            disp_wyn = false;
            Sleep(10);
            disp_back = true; disp_card = true; disp = true;
        }

        //wyœwietlenie zawartoœci na ekranie
        if (disp)
        {
            window.display();
            disp = false;
        }
        
        //obs³uga przycisków i kart
        if (sf::Mouse::isButtonPressed(sf::Mouse::Left)&& type==0)
        {
            if (isSpriteHover(sprite2.getGlobalBounds(), sf::Vector2f(event.mouseButton.x, event.mouseButton.y)) == true)
            {
                if (stan == "lang1")
                {
                    std::basic_string < sf::Uint32 > utf32line;
                    std::string line = tab[slowo][1];
                    sf::Utf8::toUtf32(line.begin(), line.end(), back_inserter(utf32line));
                    text.setString(utf32line);
                    disp_back = true; disp_card = true; disp = true;
                    stan = "lang2";

                }
                else if (stan == "lang2")
                {
                    std::basic_string < sf::Uint32 > utf32line;
                    std::string line = tab[slowo][0];
                    sf::Utf8::toUtf32(line.begin(), line.end(), back_inserter(utf32line));
                    text.setString(utf32line);
                    disp_back = true; disp_card = true; disp = true;
                    stan = "lang1";
                }
                Sleep(500);
            }
            if (isSpriteHover(sprite3.getGlobalBounds(), sf::Vector2f(event.mouseButton.x, event.mouseButton.y)) == true)
            {
                if (slowo < ile2 - 1)
                    slowo++;
                else
                {
                    disp_wyn = true;
                    type = 1;
                    slowo = 0;
                }
                if (stan == "lang1" && type == 0)
                {
                    std::basic_string < sf::Uint32 > utf32line;
                    std::string line = tab[slowo][0];
                    sf::Utf8::toUtf32(line.begin(), line.end(), back_inserter(utf32line));
                    text.setString(utf32line);
                }
                else if (stan == "lang2" && type == 0)
                {
                    std::basic_string < sf::Uint32 > utf32line;
                    std::string line = tab[slowo][0];
                    sf::Utf8::toUtf32(line.begin(), line.end(), back_inserter(utf32line));
                    text.setString(utf32line);
                    stan = "lang1";
                }
                if (disp_wyn == false)
                {
                    disp_back = true; disp_card = true;
                }
                disp = true;
                umiesz++;
                Sleep(500);
                
            }
            if (isSpriteHover(sprite4.getGlobalBounds(), sf::Vector2f(event.mouseButton.x, event.mouseButton.y)) == true)
            {
                if (slowo < ile2 - 1)
                    slowo++;
                else
                {
                    disp_wyn = true;
                    type = 1;
                    slowo = 0;
                }
                if (stan == "lang1" && type == 0)
                {
                    std::basic_string < sf::Uint32 > utf32line;
                    std::string line = tab[slowo][0];
                    sf::Utf8::toUtf32(line.begin(), line.end(), back_inserter(utf32line));
                    text.setString(utf32line);
                }
                else if (stan == "lang2" && type == 0)
                {
                    std::basic_string < sf::Uint32 > utf32line;
                    std::string line = tab[slowo][0];
                    sf::Utf8::toUtf32(line.begin(), line.end(), back_inserter(utf32line));
                    text.setString(utf32line);
                    stan = "lang1";
                    
                }
                if (disp_wyn == false)
                {
                    disp_back = true; disp_card = true; 
                }
                disp = true;
                Sleep(500);
            }
        }
        if (sf::Mouse::isButtonPressed(sf::Mouse::Left) && type == 1)
        {
            if (isSpriteHover(sprite2.getGlobalBounds(), sf::Vector2f(event.mouseButton.x, event.mouseButton.y)) == true)
            {
                std::basic_string < sf::Uint32 > utf32line;
                std::string line = tab[slowo][1];
                sf::Utf8::toUtf32(line.begin(), line.end(), back_inserter(utf32line));
                text.setString(utf32line);
                text2.setString("Click to rotate");
                disp_back = true; disp_card = true; disp = true;
                stan = "lang1";
                umiesz = 0;
                type = 0;
                Sleep(500);
                
            }
        }
    }
    return 0;
}
Installation steps

1. Extract application archive to your projects directory or clone repository from GitHub:
git clone https://github.com/ZeroGravity-82/search-engine-wrapper.git

2. Make a copy of .env.example file:
cp .env.example .env

3. Put search engines credentials into .env file.
For Yandex you should provide an API key and user name, and for Google - API key and search engine ID. DuckDuckGo does not require any credentials.

4. You can control debug mode of application with APP_DEBUG in .env file.
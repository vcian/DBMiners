
const chatInput = $("#chat-input");
const sendButton = $("#send-btn");
const chatContainer = $(".chat-container");
const themeButton = $("#theme-btn");
const deleteButton = $("#delete-btn");

let userText = 'Act like MYSQL Devloper';
const API_KEY = "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"; // Paste your API key here

// Function to load chat history and theme from local storage
const loadDataFromLocalstorage = () => {
    const themeColor = localStorage.getItem("themeColor");
    $("body").toggleClass("light-mode", themeColor === "light_mode");
    themeButton.text($("body").hasClass("light-mode") ? "dark_mode" : "light_mode");

    const defaultText = `<div class="default-text">
                          <h1>DbMiners</h1>
                          <p>Hi, I am Schema Bot.</p>
                          <p>Specialized in Schema Design.</p>
                      </div>`;

    chatContainer.html(localStorage.getItem("all-chats") || defaultText);
    chatContainer.scrollTop(chatContainer[0].scrollHeight);
}

// Function to create a chat element
const createChatElement = (content, className) => {
    const chatDiv = $("<div>").addClass("chat").addClass(className).html(content);
    return chatDiv;
}

// Function to get chat response from the API
const getChatResponse = async (incomingChatDiv) => {
    const API_URL = "https://api.openai.com/v1/completions";
    const pElement = $("<p>");
    const requestOptions = {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "Authorization": `Bearer ${API_KEY}`
        },
        body: JSON.stringify({
            model: "text-davinci-002",
            prompt: chatInput,
            temperature:0,
            max_tokens:600,
            top_p:1,
            frequency_penalty:0.0,
            presence_penalty:0.0,
            stop:["\n"]
        })
    }

    try {
        console.log('Please design schema in MYSQL format '+chatInput)
        const response = await (await fetch(API_URL, requestOptions)).json();
        console.log(response);
        pElement.text(response.choices[0].text.trim());
    } catch (error) {
        pElement.addClass("error").text("Oops! Something went wrong while retrieving the response. Please try again.");
    }

    incomingChatDiv.find(".typing-animation").remove();
    incomingChatDiv.find(".chat-details").append(pElement);
    localStorage.setItem("all-chats", chatContainer.html());
    chatContainer.scrollTop(chatContainer[0].scrollHeight);
}

// Function to copy the response text to the clipboard
const copyResponse = (copyBtn) => {
    const responseTextElement = $(copyBtn).parent().find("p");
    navigator.clipboard.writeText(responseTextElement.text());
    $(copyBtn).text("done");
    setTimeout(() => $(copyBtn).text("content_copy"), 1000);
}

// Function to show typing animation and get the chat response
const showTypingAnimation = () => {
    const html = `<div class="chat-content">
                  <div class="chat-details">
                      ${botImage}
                      <div class="typing-animation">
                          <div class="typing-dot" style="--delay: 0.2s"></div>
                          <div class="typing-dot" style="--delay: 0.3s"></div>
                          <div class="typing-dot" style="--delay: 0.4s"></div>
                      </div>
                  </div>
                  <span class="material-symbols-rounded">content_copy</span>
              </div>`;

    const incomingChatDiv = createChatElement(html, "incoming");
    chatContainer.append(incomingChatDiv);
    chatContainer.scrollTop(chatContainer[0].scrollHeight);
    getChatResponse(incomingChatDiv);
}

// Function to handle the outgoing chat message
const handleOutgoingChat = () => {
    // const promptPrefix = "Generate Mysql Query:";
    const promptPrefix = "";
    const inputText = chatInput.val().trim();
    userText = `${promptPrefix} ${inputText}`;
    // userText = chatInput.val().trim();
    if (!userText) return;

    chatInput.val("");
    chatInput.css("height", `${initialInputHeight}px`);

    const html = `<div class="chat-content">
                  <div class="chat-details">
                  ${userImage}
                      <p>${inputText}</p>
                  </div>
              </div>`;

    chatContainer.find(".default-text")?.remove();
    const outgoingChatDiv = createChatElement(html, "outgoing");
    chatContainer.append(outgoingChatDiv);
    chatContainer.scrollTop(chatContainer[0].scrollHeight);
    setTimeout(showTypingAnimation, 500);
}

// Event listener for delete button
deleteButton.on("click", () => {
    if (confirm("Are you sure you want to delete all the chats?")) {
        localStorage.removeItem("all-chats");
        loadDataFromLocalstorage();
    }
});

// Event listener for theme button
themeButton.on("click", () => {
    $("body").toggleClass("light-mode");
    localStorage.setItem("themeColor", themeButton.text());
    themeButton.text($("body").hasClass("light-mode") ? "dark_mode" : "light_mode");
});

const initialInputHeight = chatInput[0].scrollHeight;

// Event listener for input changes
chatInput.on("input", () => {
    chatInput.css("height", `${initialInputHeight}px`);
    chatInput.css("height", `${chatInput[0].scrollHeight}px`);
});

// Event listener for keydown events on the input field
chatInput.on("keydown", (e) => {
    if (e.key === "Enter" && !e.shiftKey && window.innerWidth > 800) {
        e.preventDefault();
        handleOutgoingChat();
    }
});

// Load chat history and theme from local storage
loadDataFromLocalstorage();

// Event listener for send button
sendButton.on("click", handleOutgoingChat);
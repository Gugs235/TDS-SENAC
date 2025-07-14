import React, { useState } from "react";
import {
	StyleSheet,
	Text,
	View,
	Image,
	TextInput,
	Modal,
	KeyboardAvoidingView,
	Platform,
	TouchableOpacity,
} from "react-native";
import AntDesign from "@expo/vector-icons/AntDesign";
import { NavigationContainer } from "@react-navigation/native";
import { createStackNavigator } from "@react-navigation/stack";
import NewWindow from "./NewWindow";

const Stack = createStackNavigator();

function MainScreen({ navigation }) {
	const [heartColor, setHeartColor] = useState("gray");
	const [login, setLogin] = useState("");
	const [password, setPassword] = useState("");
	const [modalVisible, setModalVisible] = useState(false);
	const [modalMessage, setModalMessage] = useState("");

	const toggleHeartColor = () => {
		setHeartColor(heartColor === "red" ? "gray" : "red");
	};

	const showAlert = () => {
		try {
			if (login === "admin" && password === "admin") {
				setModalMessage("Login e Senha corretos!");
			} else {
				setModalMessage("Login ou Senha incorretos!");
			}
			setModalVisible(true);
		} catch (error) {
			console.error("Erro Modal: ", error);
		}
	};

	return (
		<KeyboardAvoidingView
			style={styles.container}
			behavior={Platform.OS === "ios" ? "padding" : "height"}
			keyboardVerticalOffset={Platform.OS === "ios" ? 40 : 0}
		>
			<View style={styles.innerContainer}>
				<Text style={styles.text}>Aplicativo Maneiro</Text>
				<Image source={{ uri: "github.com/Mauriiicio.png" }} style={styles.image} />
				<TouchableOpacity onPress={toggleHeartColor} style={styles.heartButton}>
					<AntDesign name="heart" size={24} color={heartColor} />
				</TouchableOpacity>
				<TextInput
					style={styles.input}
					placeholder="Login"
					autoCapitalize="none"
					value={login}
					onChangeText={setLogin}
				/>
				<TextInput
					style={styles.input}
					placeholder="Senha"
					secureTextEntry
					autoCapitalize="none"
					value={password}
					onChangeText={setPassword}
				/>
				<TouchableOpacity onPress={showAlert} style={styles.customButton}>
					<Text style={styles.buttonText}>Entrar</Text>
				</TouchableOpacity>
				<Modal
					animationType="fade"
					transparent={true}
					visible={modalVisible}
					onRequestClose={() => setModalVisible(false)}
				>
					<View style={styles.modalOverlay}>
						<View style={styles.modalContent}>
							<Text style={styles.modalText}>{modalMessage}</Text>
							<TouchableOpacity
								style={styles.modalButton}
								onPress={() => {
									setModalVisible(false);
									if (login === "admin" && password === "admin") {
										navigation.navigate("NewWindow");
									}
								}}
							>
								<Text style={styles.modalButtonText}>
									{login === "admin" && password === "admin"
										? "Bem vindos"
										: "Acesso Negado"}
								</Text>
							</TouchableOpacity>
						</View>
					</View>
				</Modal>
			</View>
		</KeyboardAvoidingView>
	);
}

export default function App() {
	return (
		<NavigationContainer>
			<Stack.Navigator initialRouteName="Main">
				<Stack.Screen
					name="Main"
					component={MainScreen}
					options={{ title: "Tela Principal" }}
				/>
				<Stack.Screen
					name="NewWindow"
					component={NewWindow}
					options={{ title: "Tic Tac Toe" }}
				/>
			</Stack.Navigator>
		</NavigationContainer>
	);
}

const styles = StyleSheet.create({
	container: {
		flex: 1,
		backgroundColor: "#fff", // cor de fundo branca
	},
	innerContainer: {
		flex: 1,
		justifyContent: "center",
		alignItems: "center",
		padding: 20,
	},

	text: {
		fontSize: 18,
		marginBottom: 10,
	},
	image: {
		width: 100,
		height: 100,
		marginBottom: 15,
	},
	heartButton: {
		marginBottom: 15,
	},
	input: {
		width: "80%",
		height: 40,
		borderColor: "#ccc", // cor da borda cinza
		borderWidth: 1,
		borderRadius: 8,
		paddingHorizontal: 10,
		marginBottom: 15,
		backgroundColor: "#f9f9f9", //cor de fundo cinza claro
	},
	customButton: {
		backgroundColor: "#007AFF", // cor de fundo azul
		paddingVertical: 10,
		paddingHorizontal: 20,
		borderRadius: 8,
		alignItems: "center",
		justifyContent: "center",
		shadowColor: "#000", // sombra preta
		shadowOffset: {
			width: 0,
			height: 2,
		},
		shadowOpacity: 0.2, // opacidade da sombra
		shadowRadius: 4, // raio da sombra
		elevation: 3, // elevação para Android
	},
	buttonText: {
		color: "#fff", // cor do texto branco
		fontSize: 16,
		fontWeight: "600", // peso da fonte seminegrito
	},
	modalOverlay: {
		color: "#fff", // cor de fundo branca
		backgroundColor: "rgba(0, 0, 0, 0, 5)", // cor de fundo preta com opacidade
		justifyContent: "center",
		alignItems: "center",
	},
	modalContent: {
		backgroundColor: "#fff", // cor de fundo branca
		padding: 20,
		borderRadius: 10,
		alignItems: "center",
		width: "80%",
		maxWidth: 300, // largura máxima de 400 pixels
	},
	modalText: {
		fontSize: 16,
		marginBottom: 20,
		textAlign: "center", // centralizar o texto
	},
	modalButton: {
		backgroundColor: "#007AFF", // cor de fundo azul
		paddingVertical: 10,
		paddingHorizontal: 20,
		borderRadius: 8,
	},
	modalButtonText: {
		color: "#fff", // cor do texto branco
		fontSize: 16,
		fontWeight: "600", // peso da fonte seminegrito
	},
});
